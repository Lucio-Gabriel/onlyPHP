<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required|string||min:3|max:255')]
    public $name = '';

    #[Validate('required|email||min:3|max:255|unique:users,email')]
    public $email = '';

    #[Validate('required|max:255|confirmed')]
    public $password = '';

    public $password_confirmation = '';

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        Auth::attempt($credentials);

        session()->flash('message', 'Conta criada com sucesso.');

        return $this->redirect(route('index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.auth.register');
    }
}
