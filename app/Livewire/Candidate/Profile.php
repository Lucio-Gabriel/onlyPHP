<?php

namespace App\Livewire\Candidate;

use App\Models\CandidateProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Profile extends Component
{
    use WithFileUploads;

    public $resumeFile;
    public $profilePictureFile;

    public $full_name;
    public $email;
    public $main_stack = [];
    public $github_link;
    public $portfolio_link;
    public $linkedin_link;

    #[Computed]
    public function profile()
    {
        return CandidateProfile::query()->where('user_id', Auth::user()->id)->first();
    }

    public function mount()
    {
        $profile = $this->profile();
        if ($profile) {
            $this->full_name = $profile->full_name;
            $this->email = $profile->email;
            // Certifique-se de que main_stack é um array
            $this->main_stack = is_array($profile->main_stack) ? $profile->main_stack : json_decode($profile->main_stack, true) ?? [];
            $this->github_link = $profile->github_link;
            $this->portfolio_link = $profile->portfolio_link;
            $this->linkedin_link = $profile->linkedin_link;
        }
    }

    public function uploadResume()
    {
        $this->validate([
            'resumeFile' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            $profile = $this->profile();

            if (!$profile) {
                $this->dispatch('error', message: 'Perfil do candidato não encontrado. Não foi possível associar o currículo.');
                Log::error('Candidate profile not found for user_id: ' . Auth::user()->id . '. Resume uploaded to S3 but not linked to profile.');
                $this->resumeFile = null;
                return;
            }

            if ($profile->resume_path) {
                Storage::disk('s3')->delete($profile->resume_path);
            }

            $path = $this->resumeFile->storePublicly('resumes', 's3');

            $profile->update([
                'resume_path' => $path,
                'resume_url' => $path ? Storage::disk('s3')->url($path) : null,
            ]);
            $this->dispatch('message', message: 'Currículo enviado com sucesso para o S3!');

            $this->resumeFile = null;

        } catch (\Exception $e) {
            $this->dispatch('error', message: 'Ocorreu um erro ao enviar o currículo: ' . $e->getMessage());
            Log::error('Error uploading resume:', ['message' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine(), 'user_id' => Auth::user()->id]);
        }
    }

    public function uploadProfilePicture()
    {
        $this->validate([
            'profilePictureFile' => 'required|image|max:2048',
        ]);

        try {
            $profile = $this->profile();

            if (!$profile) {
                $this->dispatch('error', message: 'Perfil do candidato não encontrado. Não foi possível associar a foto de perfil.');
                Log::error('Candidate profile not found for user_id: ' . Auth::user()->id . '. Profile picture uploaded to S3 but not linked to profile.');
                $this->profilePictureFile = null;
                return;
            }

            if ($profile->profile_picture_path) {
                Storage::disk('s3')->delete($profile->profile_picture_path);
            }

            $path = $this->profilePictureFile->storePublicly('profile_pictures', 's3');

            $profile->update([
                'profile_picture_path' => $path,
            ]);
            $this->dispatch('message', message: 'Foto de perfil enviada com sucesso para o S3!');

            $this->profilePictureFile = null;
        } catch (\Exception $e) {
            $this->dispatch('error', message: 'Ocorreu um erro ao enviar a foto de perfil: ' . $e->getMessage());
            Log::error('Error uploading profile picture:', ['message' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine(), 'user_id' => Auth::user()->id]);
        }
    }
    public function updateProfile()
    {
        $this->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'main_stack' => 'nullable|array',
            'main_stack.*' => 'string|max:255',
            'github_link' => 'nullable|url|max:255',
            'portfolio_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
        ]);

        try {
            $profile = $this->profile();

            if ($profile) {
                $profile->update([
                    'full_name' => $this->full_name,
                    'email' => $this->email,
                    'main_stack' => $this->main_stack,
                    'github_link' => $this->github_link,
                    'portfolio_link' => $this->portfolio_link,
                    'linkedin_link' => $this->linkedin_link,
                ]);
                $this->dispatch('message', message: 'Dados do perfil atualizados com sucesso!');
            } else {
                CandidateProfile::create([
                    'user_id' => Auth::user()->id,
                    'full_name' => $this->full_name,
                    'email' => $this->email,
                    'main_stack' => $this->main_stack,
                    'github_link' => $this->github_link,
                    'portfolio_link' => $this->portfolio_link,
                    'linkedin_link' => $this->linkedin_link,
                ]);
                $this->dispatch('message', message: 'Perfil criado com sucesso!');
            }
            $this->profile = $this->profile();

        } catch (\Exception $e) {
            $this->dispatch('error', message: 'Ocorreu um erro ao atualizar o perfil: ' . $e->getMessage());
            Log::error('Error updating profile:', ['message' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine(), 'user_id' => Auth::user()->id]);
        }
    }

    public function render(): View
    {
        return view('livewire.candidate.profile', [
            'profile' => $this->profile(),
            'resumeUrl' => $this->profile() ? $this->profile()->resume_url : null,
        ]);
    }
}
