<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::prefix('candidate')->group(function () {
    Route::get('/login', App\Livewire\Auth\Login::class)->name('login.candidate');

    Route::get('/index', App\Livewire\Candidate\Index::class)
        ->middleware('auth')
        ->name('index');
});
