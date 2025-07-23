<?php

namespace App\Livewire\Candidate\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;

class LinkedinCallback extends Component
{
    public function mount()
    {
        $userLinkedin = Socialite::driver('linkedin')->user();

        $user = User::updateOrCreate([
            'linkedin_id' => $userLinkedin->getId(),
        ], [
            'name'           => $userLinkedin->getName(),
            'email'          => $userLinkedin->getEmail(),
            'avatar'         => $userLinkedin->getAvatar(),
            'linkedin_id'    => $userLinkedin->getId(),
            'linkedin_token' => $userLinkedin->token,
            'is_candidate'   => true,
        ]);

        Auth::login($user);

        return redirect()->route('index')->with('message', 'Login feito com sucesso com LinkedIn.');
    }

    public function render(): View
    {
        return view('livewire.candidate.auth.linkedin-callback');
    }
}
