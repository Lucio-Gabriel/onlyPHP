<?php

namespace App\Livewire\NewRecruiter\Vacancy;

use App\Models\Vacancy;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{

    #[Computed]
    public function vacancies()
    {
        return Vacancy::get();
    }

    public function render()
    {
        return view('livewire.new-recruiter.vacancy.index');
    }
}
