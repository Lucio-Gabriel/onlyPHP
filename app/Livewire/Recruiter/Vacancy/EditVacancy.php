<?php

namespace App\Livewire\Recruiter\Vacancy;

use App\Enums\Vacancy\VacancyContractTypeEnum;
use App\Enums\Vacancy\VacancyLocationEnum;
use App\Enums\Vacancy\VacancyTypeEnum;
use App\Livewire\Forms\VacancyForm;
use App\Models\Vacancy;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class EditVacancy extends Component
{
    public Vacancy $vacancy;

    public VacancyForm $form;

    public function mount(Vacancy $vacancy): void
    {
        $this->form->vacancy = $vacancy;
        $this->form->title = $vacancy->title;
        $this->form->description = $vacancy->description;
        $this->form->city = $vacancy->city;
        $this->form->stacks = $vacancy->stacks;
        $this->form->state = $vacancy->state;
        $this->form->company = $vacancy->company;
        $this->form->salary = $vacancy->salary;
        $this->form->type = $vacancy->type->value;
        $this->form->contract_type = $vacancy->contract_type->value;
        $this->form->location = $vacancy->location->value;
    }

    public function save()
    {
        $this->authorize('update', $this->vacancy);
        $this->validate();
        $this->vacancy->update([
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
        ]);

        return redirect()->to(route('vacancies.index.recruiter'));
    }

    public function render()
    {
        return view('livewire.recruiter.vacancy.edit-vacancy', [
            'contract_types' => VacancyContractTypeEnum::cases(),
            'types'          => VacancyTypeEnum::cases(),
            'locations'      => VacancyLocationEnum::cases(),
        ]);
    }
}
