<?php

use App\Livewire\Candidate\Auth\Register;
use App\Models\User;
use Livewire\Livewire;

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

it('should be able to register', function () {
    Livewire::test(Register::class)
        ->set('name', 'admin')
        ->set('email', 'admin@example.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertRedirect(route('index'))
        ->assertSessionHas('message', 'Conta criada com sucesso.');

    assertAuthenticated();

    assertDatabaseCount(User::class, 1);
    assertDatabaseHas(User::class, [
        'name'  => 'admin',
        'email' => 'admin@example.com',
    ]);
});

it('should be able to validate the name field', function ($rule, $value) {
    Livewire::test(Register::class)
        ->set('name', $value)
        ->call('register')
        ->assertHasErrors(['name' => $rule]);
})->with([
    'required' => ['required', ''],
    'max:255'  => ['max:255', str_repeat('a', 256)],
    'min:3'    => ['min:3', 'aa'],
]);

it('should be able to validate the email field', function ($rule, $value) {
    User::factory()->create(['email' => 'joe@doe.com']);

    Livewire::test(Register::class)
        ->set('email', $value)
        ->call('register')
        ->assertHasErrors(['email' => $rule]);
})->with([
    'required' => ['required', ''],
    'email'    => ['email', 'wrong-email.com'],
    'max:255'  => ['max:255', str_repeat('a', 256)],
    'min:3'    => ['min:3', 'aa'],
    'unique'   => ['unique', 'joe@doe.com'],
]);

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
