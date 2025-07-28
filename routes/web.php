<?php

use App\Http\Controllers\Recruiter\Auth\Login as LoginRecruiter;
use App\Http\Controllers\Recruiter\Auth\Register as RegisterRecruiter;
use App\Livewire\Candidate\Auth\LinkedinCallback;
use App\Livewire\Candidate\Auth\Login;
use App\Livewire\Candidate\Auth\Register;
use App\Livewire\Recruiter\Vacancy\CreateVacancy;
use App\Livewire\Recruiter\Vacancy\EditVacancy;
use App\Livewire\Recruiter\Vacancy\ListVacancy;
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
        return redirect()->route('index');
    });

    Route::get('/login', Login::class)
        ->name('login.candidate');

    Route::get('/register', Register::class)
        ->name('register.candidate');

    Route::get('/index', App\Livewire\Candidate\Index::class)
        ->middleware('auth.candidate')
        ->name('index');

    Route::get('/aplications-vacancies/{vacancy}', App\Livewire\Candidate\ApplyToVacancy::class)
        ->middleware('auth.candidate')
        ->name('applications.vacancies');
});

Route::prefix('recruiter')->group(function () {
    Route::get('/login', LoginRecruiter::class)->name('login.recruiter');
    Route::get('/register', [RegisterRecruiter::class, 'index'])->name('register.recruiter');

    // Route::get('/vacancies/create', CreateVacancy::class)->name('vacancies.store.recruiter')->middleware('auth');
    // Route::get('/vacancies/', ListVacancy::class)->name('vacancies.index.recruiter')->middleware('auth');
    // Route::get('/vacancies/edit/{vacancy}', EditVacancy::class)->name('vacancies.edit.recruiter')->middleware('auth');

    Route::get('vacancies/index', App\Livewire\NewRecruiter\Vacancy\Index::class)
        ->name('vacancies.index.recruiter')
        ->middleware('auth');

    Route::get('vacancies/create', App\Livewire\NewRecruiter\Vacancy\Create::class)
        ->name('vacancies.create.recruiter')
        ->middleware('auth');

    Route::get('/auth/redirect', function () {
        return Socialite::driver('linkedin_recruiter')->redirect();
    })->name('auth.recruiter.linkedin.redirect');

    Route::get('/auth/callback', [RegisterRecruiter::class, 'store'])
        ->name('auth.recruiter.linkedin.callback');
});
