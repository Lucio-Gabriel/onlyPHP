<?php

namespace App\Livewire\Recruiter\Vacancy;

use App\Enums\Vacancy\VacancyContractTypeEnum;
use App\Enums\Vacancy\VacancyLocationEnum;
use App\Enums\Vacancy\VacancyTypeEnum;
use App\Models\Vacancy;
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
    public string $salary;

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
            'description'   => 'required|string|max:255',
            'city'          => 'required|string|max:100',
            'state'         => 'required|string|max:2',
            'company'       => 'required|string|max:255',
            'stacks'        => 'required|string|max:255',
            'salary'        => 'required|string|min:0',
            'type'          => 'required|string|in:'.VacancyTypeEnum::toRule(),
            'contract_type' => 'required|string|in:'.VacancyContractTypeEnum::toRule(),
            'location'      => 'required|in:'.VacancyLocationEnum::toRule(),
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'         => 'O título da vaga é obrigatório.',
            'title.string'           => 'O título da vaga deve ser uma string.',
            'title.max'              => 'O título da vaga deve ter no máximo 255 caracteres.',
            'description.required'   => 'A descrição da vaga é obrigatória.',
            'description.string'     => 'A descrição da vaga deve ser uma string.',
            'description.max'        => 'A descrição da vaga deve ter no máximo 255 caracteres.',
            'city.required'          => 'A cidade é obrigatória.',
            'city.string'            => 'A cidade deve ser uma string.',
            'city.max'               => 'A cidade deve ter no máximo 100 caracteres.',
            'state.required'         => 'O estado é obrigatório.',
            'state.string'           => 'O estado deve ser uma string.',
            'state.max'              => 'O estado deve ter no máximo 2 caracteres.',
            'company.required'       => 'O nome da empresa é obrigatório.',
            'company.string'         => 'O nome da empresa deve ser uma string.',
            'company.max'            => 'O nome da empresa deve ter no máximo 255 caracteres',
            'stacks.required'        => 'As stacks são obrigatórias.',
            'stacks.string'          => 'As stacks devem ser uma string.',
            'stacks.max'             => 'As stacks devem ter no máximo 255 caracteres.',
            'salary.required'        => 'O salário é obrigatório.',
            'salary.string'          => 'O salário deve ser um número inteiro.',
            'salary.min'             => 'O salário deve ser maior que 0.',
            'type.required'          => 'O tipo de vaga é obrigatório.',
            'contract_type.required' => 'O tipo de contrato é obrigatório.',
            'location.required'      => 'A localização da vaga é obrigatória.',
        ];
    }

    public function save()
    {
        $this->validate();

        $salary = (float) str_replace(['.', ','], ['', '.'], $this->salary);

        Vacancy::create([
            'title'         => $this->title,
            'description'   => $this->description,
            'city'          => $this->city,
            'state'         => $this->state,
            'company'       => $this->company,
            'stacks'        => $this->stacks,
            'salary'        => $salary,
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
        return view('livewire.recruiter.vacancy.create');
    }
}
