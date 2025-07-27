<?php

namespace App\Livewire\Recruiter\Vacancy;

use App\Models\Vacancy;
use Livewire\Component;

class DeleteVacancy extends Component
{
    public Vacancy $vacancy;

    public function mount(Vacancy $vacancy): void
    {
        $this->vacancy = $vacancy;
    }

    public function destroy()
    {
        $this->authorize('delete', $this->vacancy);
        $this->vacancy->delete();
    }

    public function render(): string
    {
        return <<<'HTML'
        <div>
            <button class="background-color:red" wire:click="destroy" wire:confirm="Tem Certeza Que Deseja Excluir Esta Vaga?">Delete</button>
        </div>
        HTML;
    }
}
