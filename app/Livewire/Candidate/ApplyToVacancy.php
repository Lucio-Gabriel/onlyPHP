<?php

namespace App\Livewire\Candidate;

use App\Models\Vacancy;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class ApplyToVacancy extends Component
{
    public Vacancy $vacancy;

    public function mount(Vacancy $vacancy): void
    {
        $this->vacancy = $vacancy;
    }

    public function apply(): Redirector
    {
        auth()->user()->applied_vacancies()->syncWithoutDetaching([$this->vacancy->getKey()]);
        return redirect()->route('index');
    }

    public function render(): View
    {
        return view('livewire.candidate.apply-to-vacancy');
    }
}
