<?php

use App\Livewire\Candidate\Auth\LinkedinCallback;
use App\Livewire\Candidate\Auth\Login;
use App\Livewire\Candidate\Auth\Register;
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

Route::get('/auth/callback', LinkedinCallback::class)
    ->name('auth.linkedin.callback');

Route::prefix('candidate')->group(function () {
    Route::get('/', function () {
        return redirect()->route('index.candidate');
    });
    Route::get('/login', Login::class)
        ->middleware('redirect.candidate')
        ->name('login.candidate');

    Route::get('/register', Register::class)
        ->middleware('redirect.candidate')
        ->name('register.candidate');

    Route::get('/index', App\Livewire\Candidate\Index::class)
        ->middleware('auth.candidate')
        ->name('index');

    Route::get('/aplications-vacancies', App\Livewire\Candidate\ApplyToVacancy::class)
        ->middleware('auth.candidate')
        ->name('applications.vacancies');
});
