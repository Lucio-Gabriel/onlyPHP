<?php

namespace App\Livewire\Candidate;

use App\Enums\ApplicationStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.candidate');
    }

    #[Computed]
    public function vacancies()
    {
        return \App\Models\Vacancy::limit(6)->get();
    }

    public function render()
    {
        return view('livewire.candidate.index', [
            'ApplicationStatus' => ApplicationStatus::class,
        ]);
    }
}
