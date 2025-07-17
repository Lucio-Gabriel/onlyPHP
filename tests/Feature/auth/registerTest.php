<?php

use App\Livewire\Auth\Register;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('must be able to register', function () {
    Livewire::test(Register::class)
        ->set('name', 'admin')
        ->set('email', 'admin@example.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertRedirect(route('index'))
        ->assertSessionHas('message', 'Conta criada com sucesso.');
});

it('should be able to validate the name field', function () {
    Livewire::test(Register::class)
        ->set('name', '')
        ->call('register')
        ->assertHasErrors(['name' => 'required'])
        ->set('name', str_repeat('a', 256))
        ->call('register')
        ->assertHasErrors(['name' => 'max']);
});

it('should be able to validate the email field', function () {
    Livewire::test(Register::class)
        ->set('email', '')
        ->call('register')
        ->assertHasErrors(['email' => 'required'])
        ->set('email', 'jhonexample.com')
        ->call('register')
        ->assertHasErrors(['email' => 'email'])
        ->set('email', str_repeat('a', 256))
        ->call('register')
        ->assertHasErrors(['email' => 'max'])
        ->set('email', 'admin@example.com')
        ->call('register')
        ->assertHasErrors(['email' => 'unique']);
});

it('should be able to validate the password field', function () {
    Livewire::test(Register::class)
        ->set('password', '')
        ->call('register')
        ->assertHasErrors(['password' => 'required'])
        ->set('password', str_repeat('a', 256))
        ->call('register')
        ->assertHasErrors(['password' => 'max'])
        ->set('password', 'password')
        ->set('password_confirmation', 'password_invalid')
        ->call('register')
        ->assertHasErrors(['password' => 'confirmed']);
});
