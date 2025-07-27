<?php

namespace App\Livewire\Candidate\Auth;

use App\Models\User;
use App\Models\CandidateProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required|string|min:3|max:255')]
    public string $name = '';

    #[Validate('required|email|min:3|max:255|unique:users,email')]
    public string $email = '';

    #[Validate('required|max:255|min:3|confirmed')]
    public string $password = '';

    public string $password_confirmation = '';

    public bool $remember = false;

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min'      => 'O campo nome deve ter no mínimo 3 caracteres.',
            'name.max'      => 'O campo nome deve ter no máximo 255 caracteres.',

            'email.required' => 'O campo email é obrigatório.',
            'email.email'    => 'O campo email é inválido.',
            'email.min'      => 'O campo email deve ter no mínimo 3 caracteres.',
            'email.max'      => 'O campo email deve ter no máximo 255 caracteres.',
            'email.unique'   => 'O email já está em uso.',

            'password.required'  => 'O campo senha é obrigatório.',
            'password.min'       => 'O campo senha deve ter no mínimo 3 caracteres.',
            'password.max'       => 'O campo senha deve ter no máximo 255 caracteres.',
            'password.confirmed' => 'As senhas não conferem.',
        ];
    }

    public function register(): null
    {
        $this->validate();

        $user = User::query()->create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $profile = CandidateProfile::query()->create([
            'user_id' => $user->id,
            'full_name' => $this->name,
            'email' => $this->email,
        ]);
        Auth::login($user, $this->remember);

        session()->flash('message', 'Conta criada com sucesso.');

        return $this->redirect(route('index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.candidate.auth.register');
    }
}
