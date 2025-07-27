<?php

namespace App\Livewire\Recruiter\Vacancy;

use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class ListVacancy extends Component
{
    use WithPagination;

    #[Computed]
    public function vacancies(): LengthAwarePaginator
    {
        return auth()->user()->vacancies()->paginate(10);
    }

    public function render()
    {
        return view('livewire.recruiter.vacancy.list-vacancy');
    }
}
