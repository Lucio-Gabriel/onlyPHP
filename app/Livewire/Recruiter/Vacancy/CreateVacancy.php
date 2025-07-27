<?php

namespace App\Livewire\Recruiter\Vacancy;

use App\Enums\Vacancy\VacancyContractTypeEnum;
use App\Enums\Vacancy\VacancyLocationEnum;
use App\Enums\Vacancy\VacancyTypeEnum;
use App\Livewire\Forms\VacancyForm;
use App\Models\Vacancy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class CreateVacancy extends Component
{
    public VacancyForm $form;

    /**
     * @throws AuthorizationException
     */
    public function save(): Redirector
    {
        $this->authorize('create', Vacancy::class);
        $this->validate();

        Vacancy::query()->create([
            'title'         => $this->form->title,
            'description'   => $this->form->description,
            'city'          => $this->form->city,
            'state'         => $this->form->state,
            'company'       => $this->form->company,
            'stacks'        => $this->form->stacks,
            'salary'        => $this->form->salary,
            'type'          => $this->form->type,
            'contract_type' => $this->form->contract_type,
            'location'      => $this->form->location,
            'user_id'       => auth()->id(),
        ]);

        return redirect()->to(route('index'));
    }

    public function render(): View
    {
        return view('livewire.recruiter.vacancy.create-vacancy', [
            'contract_types' => VacancyContractTypeEnum::cases(),
            'types'          => VacancyTypeEnum::cases(),
            'locations'      => VacancyLocationEnum::cases(),
        ]);
    }
}
