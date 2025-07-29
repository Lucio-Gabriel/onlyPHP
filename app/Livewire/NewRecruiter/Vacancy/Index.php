<?php

namespace App\Livewire\NewRecruiter\Vacancy;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    #[Computed]
    public function vacancies(): Collection
    {
        return Vacancy::get();
    }

    #[Computed]
    public function vacanciesRegistered(): int
    {
        return Vacancy::count();
    }

    public function delete(int $vacancyId): void
    {
        Vacancy::findOrFail($vacancyId)->delete();

        session()->flash('message', 'Vaga removida com sucesso.');
    }

    public function render()
    {
        return view('livewire.new-recruiter.vacancy.index');
    }
}
