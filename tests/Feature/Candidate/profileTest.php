<?php

use App\Livewire\Candidate\Profile;
use App\Models\CandidateProfile;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(function () {
    // Cria um usuário para autenticação
    $this->user = User::factory()->create();
    actingAs($this->user);

    // Falsifica o disco S3 para que os uploads não atinjam o S3 real durante os testes
    Storage::fake('s3');
});

it('should load existing profile data on mount', function () {
    // Cria um perfil de candidato para o usuário
    $profileData = [
        'user_id' => $this->user->id,
        'full_name' => 'João Silva',
        'email' => 'joao.silva@example.com',
        'main_stack' => ['PHP', 'Laravel'],
        'github_link' => 'https://github.com/joaosilva',
        'portfolio_link' => 'https://joaosilva.com',
        'linkedin_link' => 'https://linkedin.com/in/joaosilva',
    ];
    CandidateProfile::create($profileData);

    Livewire::test(Profile::class)
        ->assertSet('full_name', $profileData['full_name'])
        ->assertSet('email', $profileData['email'])
        ->assertSet('main_stack', $profileData['main_stack'])
        ->assertSet('github_link', $profileData['github_link'])
        ->assertSet('portfolio_link', $profileData['portfolio_link'])
        ->assertSet('linkedin_link', $profileData['linkedin_link']);
});

it('should create a new profile if none exists on update', function () {
    Livewire::test(Profile::class)
        ->set('full_name', 'Novo Candidato')
        ->set('email', 'novo@example.com')
        ->set('main_stack', ['Vue.js'])
        ->call('updateProfile')
        ->assertDispatched('message', message: 'Perfil criado com sucesso!'); // Alterado para assertDispatched

    assertDatabaseHas('candidate_profiles', [
        'user_id' => $this->user->id,
        'full_name' => 'Novo Candidato',
        'email' => 'novo@example.com',
        'main_stack' => json_encode(['Vue.js']), // Stored as JSON
    ]);
});

it('should update existing profile data', function () {
    // Cria um perfil existente
    $profile = CandidateProfile::create([
        'user_id' => $this->user->id,
        'full_name' => 'Nome Antigo',
        'email' => 'antigo@example.com',
        'main_stack' => ['Java'],
    ]);

    Livewire::test(Profile::class)
        ->set('full_name', 'Nome Atualizado')
        ->set('email', 'atualizado@example.com')
        ->set('main_stack', ['React', 'Node.js'])
        ->set('github_link', 'https://github.com/updated')
        ->call('updateProfile')
        ->assertDispatched('message', message: 'Dados do perfil atualizados com sucesso!'); // Alterado para assertDispatched

    assertDatabaseHas('candidate_profiles', [
        'user_id' => $this->user->id,
        'full_name' => 'Nome Atualizado',
        'email' => 'atualizado@example.com',
        'main_stack' => json_encode(['React', 'Node.js']),
        'github_link' => 'https://github.com/updated',
    ]);
});

it('should validate profile data fields', function ($field, $value, $rule) {
    Livewire::test(Profile::class)
        ->set($field, $value)
        ->call('updateProfile')
        ->assertHasErrors([$field => $rule]);
})->with([
    ['full_name', '', 'required'],
    ['full_name', str_repeat('a', 256), 'max:255'],
    ['email', '', 'required'],
    ['email', 'invalid-email', 'email'],
    ['email', str_repeat('a', 256) . '@example.com', 'max:255'],
    ['github_link', 'not-a-url', 'url'],
    ['portfolio_link', 'not-a-url', 'url'],
    ['linkedin_link', 'not-a-url', 'url'],
]);

it('should upload a resume file to S3 and update profile', function () {
    $profile = CandidateProfile::create([
        'user_id' => $this->user->id,
        'full_name' => 'Test User',
        'email' => 'test@example.com',
    ]);

    $file = UploadedFile::fake()->create('resume.pdf', 100, 'application/pdf');

    Livewire::test(Profile::class)
        ->set('resumeFile', $file)
        ->call('uploadResume')
        ->assertDispatched('message', message: 'Currículo enviado com sucesso para o S3!'); // Alterado para assertDispatched

    Storage::disk('s3')->assertExists('resumes/' . $file->hashName());

    $profile->refresh(); // Recarrega o perfil para obter os dados atualizados
    expect($profile->resume_path)->not->toBeNull();
    expect($profile->resume_url)->not->toBeNull();
    assertDatabaseHas('candidate_profiles', [
        'user_id' => $this->user->id,
        'resume_path' => 'resumes/' . $file->hashName(),
    ]);
});

it('should replace an old resume file with a new one on S3', function () {
    $oldPath = 'resumes/old_resume.pdf';
    Storage::disk('s3')->put($oldPath, 'old content');

    $profile = CandidateProfile::create([
        'user_id' => $this->user->id,
        'full_name' => 'Test User',
        'email' => 'test@example.com',
        'resume_path' => $oldPath,
        'resume_url' => Storage::disk('s3')->url($oldPath),
    ]);

    $newFile = UploadedFile::fake()->create('new_resume.docx', 150, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');

    Livewire::test(Profile::class)
        ->set('resumeFile', $newFile)
        ->call('uploadResume')
        ->assertDispatched('message', message: 'Currículo enviado com sucesso para o S3!'); // Alterado para assertDispatched

    Storage::disk('s3')->assertExists('resumes/' . $newFile->hashName());
    Storage::disk('s3')->assertMissing($oldPath); // Verifica se o arquivo antigo foi excluído

    $profile->refresh();
    expect($profile->resume_path)->toBe('resumes/' . $newFile->hashName());
});

it('should validate resume file type and size', function ($file, $rule) {
    Livewire::test(Profile::class)
        ->set('resumeFile', $file)
        ->call('uploadResume')
        ->assertHasErrors(['resumeFile' => $rule]);
})->with([
    'required' => [null, 'required'],
    'mimes' => [UploadedFile::fake()->image('photo.jpg'), 'mimes'],
    'max_2mb' => [UploadedFile::fake()->create('large.pdf', 2049, 'application/pdf'), 'max:2048'],
]);

it('should upload a profile picture to S3 and update profile', function () {
    $profile = CandidateProfile::create([
        'user_id' => $this->user->id,
        'full_name' => 'Test User',
        'email' => 'test@example.com',
    ]);

    $file = UploadedFile::fake()->image('avatar.jpg', 100, 100)->size(500); // 500KB

    Livewire::test(Profile::class)
        ->set('profilePictureFile', $file)
        ->call('uploadProfilePicture')
        ->assertDispatched('message', message: 'Foto de perfil enviada com sucesso para o S3!'); // Alterado para assertDispatched

    Storage::disk('s3')->assertExists('profile_pictures/' . $file->hashName());

    $profile->refresh();
    expect($profile->profile_picture_path)->toBe('profile_pictures/' . $file->hashName());
    assertDatabaseHas('candidate_profiles', [
        'user_id' => $this->user->id,
        'profile_picture_path' => 'profile_pictures/' . $file->hashName(),
    ]);
});

it('should replace an old profile picture with a new one on S3', function () {
    $oldPath = 'profile_pictures/old_avatar.jpg';
    Storage::disk('s3')->put($oldPath, 'old content');

    $profile = CandidateProfile::create([
        'user_id' => $this->user->id,
        'full_name' => 'Test User',
        'email' => 'test@example.com',
        'profile_picture_path' => $oldPath,
    ]);

    $newFile = UploadedFile::fake()->image('new_avatar.png', 100, 100)->size(600);

    Livewire::test(Profile::class)
        ->set('profilePictureFile', $newFile)
        ->call('uploadProfilePicture')
        ->assertDispatched('message', message: 'Foto de perfil enviada com sucesso para o S3!'); // Alterado para assertDispatched

    Storage::disk('s3')->assertExists('profile_pictures/' . $newFile->hashName());
    Storage::disk('s3')->assertMissing($oldPath); // Verifica se o arquivo antigo foi excluído

    $profile->refresh();
    expect($profile->profile_picture_path)->toBe('profile_pictures/' . $newFile->hashName());
});

it('should validate profile picture file type and size', function ($file, $rule) {
    Livewire::test(Profile::class)
        ->set('profilePictureFile', $file)
        ->call('uploadProfilePicture')
        ->assertHasErrors(['profilePictureFile' => $rule]);
})->with([
    'required' => [null, 'required'],
    'image' => [UploadedFile::fake()->create('document.bin', 1, 'application/octet-stream'), 'image'], // Alterado para um arquivo binário genérico
    'max_2mb' => [UploadedFile::fake()->image('large_image.jpg')->size(2049), 'max:2048'],
]);
