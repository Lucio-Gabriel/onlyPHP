<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
            'vacancies' => 500,
            'candidates' => 1200,
    ]);
})->name('welcome');

use Laravel\Socialite\Facades\Socialite;
 
Route::get('/auth/redirect', function () {
    return Socialite::driver('linkedin')->redirect();
})->name('auth.linkedin.redirect');
 
Route::get('/auth/callback', function () {
    $userLinkedin = Socialite::driver('linkedin')->user();
    $user = User::updateOrCreate([
        'linkedin_id' => $userLinkedin->getId(),
    ], [
        'name' => $userLinkedin->getName(),
        'email' => $userLinkedin->getEmail(),
        'avatar' => $userLinkedin->getAvatar(),
        'linkedin_id' => $userLinkedin->getId(),
        'linkedin_token' => $userLinkedin->token,
        'is_candidate' => true,
    ]);

    Auth::login($user);

    return redirect()->route('index')->with('message', 'Login feito com sucesso com LinkedIn.');
});

Route::prefix('candidate')->group(function () {
    Route::get('/login', \App\Livewire\Candidate\Auth\Login::class)->name('login.candidate');

    Route::get('/register', \App\Livewire\Candidate\Auth\Register::class)->name('register.candidate');

    Route::get('/index', App\Livewire\Candidate\Index::class)
        ->middleware('auth')
        ->name('index');
});
