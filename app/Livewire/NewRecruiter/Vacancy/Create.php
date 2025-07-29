<?php

namespace App\Livewire\NewRecruiter\Vacancy;

use App\Enums\Vacancy\VacancyContractTypeEnum;
use App\Enums\Vacancy\VacancyLocationEnum;
use App\Enums\Vacancy\VacancyTypeEnum;
use App\Models\Vacancy;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Create extends Component
{
    #[Computed]
    public string $title = '';

    #[Computed]
    public string $description = '';

    #[Computed]
    public string $city = '';

    #[Computed]
    public string $state = '';

    #[Computed]
    public string $company = '';

    #[Computed]
    public string $stacks = '';

    #[Computed]
    public int $salary;

    #[Computed]
    public string $type;

    #[Computed]
    public string $contract_type;

    #[Computed]
    public string $location;

    public function rules(): array
    {
        return [
            'title'         => 'required|string|max:255',
            'description'   => 'required|string|max:1000',
            'city'          => 'required|string|max:100',
            'state'         => 'required|string|max:2',
            'company'       => 'required|string|max:255',
            'stacks'        => 'required|string|max:255',
            'salary'        => 'required|integer|min:0',
            'type'          => 'required|string|in:' . VacancyTypeEnum::toRule(),
            'contract_type' => 'required|string|in:' . VacancyContractTypeEnum::toRule(),
            'location'      => 'required|in:' . VacancyLocationEnum::toRule(),
        ];
    }

    public function save()
    {
        $this->validate();

        Vacancy::create([
            'title'         => $this->title,
            'description'   => $this->description,
            'city'          => $this->city,
            'state'         => $this->state,
            'company'       => $this->company,
            'stacks'        => $this->stacks,
            'salary'        => $this->salary,
            'type'          => $this->type,
            'contract_type' => $this->contract_type,
            'location'      => $this->location,
            'user_id'       => auth()->id(),
        ]);

        session()->flash('message', 'Vaga criada com sucesso.');

        return redirect()->route('vacancies.index.recruiter');
    }

    public function render(): View
    {
        return view('livewire.new-recruiter.vacancy.create');
    }
}
