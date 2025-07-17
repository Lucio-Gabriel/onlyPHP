<?php

namespace App\Livewire\Candidate;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.candidate');
    }

    public function render()
    {
        return view('livewire.candidate.index');
    }
}
