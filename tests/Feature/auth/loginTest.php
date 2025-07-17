<?php

use App\Livewire\Auth\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('must be able to log in', function () {
    $user = User::create([
        'name'     => 'John',
        'email'    => 'john@example.com',
        'password' => Hash::make('password'),
    ]);

    Livewire::test(Login::class)
        ->set('email', 'john@example.com')
        ->set('password', 'password')
        ->call('login')
        ->assertRedirect(route('index'))
        ->assertSessionHas('message', 'Login feito com sucesso.');
});

it('must validate the email field', function () {
    Livewire::test(Login::class)
        ->set('email', '')
        ->call('login')
        ->assertHasErrors(['email' => 'required'])
        ->set('email', 'jhonexample.com')
        ->call('login')
        ->assertHasErrors(['email' => 'email'])
        ->set('email', str_repeat('a', 256))
        ->call('login')
        ->assertHasErrors(['email' => 'max']);
});

it('must validate the password field', function () {
    Livewire::test(Login::class)
        ->set('password', '')
        ->call('login')
        ->assertHasErrors(['password' => 'required'])
        ->set('password', str_repeat('a', 256))
        ->call('login')
        ->assertHasErrors(['password' => 'max']);
});
