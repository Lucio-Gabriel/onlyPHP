<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('candidate')->group(function () {
    Route::get('/login', \App\Livewire\Candidate\Auth\Login::class)->name('login.candidate');

    Route::get('/register', \App\Livewire\Candidate\Auth\Register::class)->name('register.candidate');

    Route::get('/index', App\Livewire\Candidate\Index::class)
        ->middleware('auth')
        ->name('index');
});
