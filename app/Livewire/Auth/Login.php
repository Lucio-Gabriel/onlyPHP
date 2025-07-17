<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email|max:255')]
    public $email;

    #[Validate('required|max:255')]
    public $password;

    public function messages(): array
    {
        return [
            'email.required'    => 'O campo email é obrigatório.',
            'email.email'       => 'O campo email é inválido.',
            'email.max'         => 'O campo email deve ter no máximo 255 caracteres.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.max'      => 'O campo senha deve ter no máximo 255 caracteres.',
        ];
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'email'    => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            session()->flash('message', 'Login feito com sucesso.');

            return redirect(route('index'));
        }
    }

    public function render(): View
    {
        return view('livewire.auth.login');
    }
}
