<?php

namespace App\Livewire\Candidate;

use App\Models\Vacancy;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ApplyToVacancy extends Component
{

    #[Computed]
    public function vacancies()
    {
        return Vacancy::limit(1)->get();
    }

    public function render(): View
    {
        return view('livewire.candidate.apply-to-vacancy');
    }
}
