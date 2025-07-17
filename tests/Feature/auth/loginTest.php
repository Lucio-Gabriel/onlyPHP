<?php

use App\Livewire\Auth\Login;
use Livewire\Livewire;

it('must be able to log in', function () {
    Livewire::test(Login::class)
        ->set('email', 'jhon@example.com')
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
