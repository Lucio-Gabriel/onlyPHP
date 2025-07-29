<?php

namespace App\Livewire\NewRecruiter\Vacancy;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    #[Url(as: 'q', keep: true)]
    public string $search = '';

    #[Computed]
    public function vacancies(): Collection
    {
        return Vacancy::query()
            ->where(fn ($q) => $q->where('title', 'like', "%{$this->search}%")
                ->orWhere('company', 'like', "%{$this->search}%")
                ->orWhere('location', 'like', "%{$this->search}%"))
            ->get();
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
