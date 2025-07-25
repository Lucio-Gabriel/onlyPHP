<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome', [
        'vacancies'  => 500,
        'candidates' => 1200,
    ]);
})->name('welcome');

Route::get('/auth/redirect', function () {
    return Socialite::driver('linkedin')->redirect();
})->name('auth.linkedin.redirect');

Route::get('/auth/callback', \App\Livewire\Candidate\Auth\LinkedinCallback::class)
    ->name('auth.linkedin.callback');

Route::prefix('candidate')->group(function () {
    Route::get('/login', \App\Livewire\Candidate\Auth\Login::class)->name('login.candidate');

    Route::get('/register', \App\Livewire\Candidate\Auth\Register::class)->name('register.candidate');

    Route::get('/', App\Livewire\Candidate\Index::class)
        ->middleware('auth')
        ->name('index');

    Route::get('/aplications-vacancies/{vacancy}', App\Livewire\Candidate\ApplyToVacancy::class)
        ->middleware('auth')
        ->name('applications.vacancies');
});
