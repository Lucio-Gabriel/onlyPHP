<?php

namespace App\Livewire\Forms;

use App\Enums\Vacancy\VacancyContractTypeEnum;
use App\Enums\Vacancy\VacancyLocationEnum;
use App\Enums\Vacancy\VacancyTypeEnum;
use Illuminate\Validation\Rule;
use Livewire\Form;

class VacancyForm extends Form
{
    public string $title;

    public string $description;

    public string $city;

    public string $stacks;

    public string $state;

    public string $company;

    public string $salary;

    public string $type;

    public string $contract_type;

    public string $location;

    protected function rules(): array
    {
        return [
            'title'         => 'required|string|min:3|max:255',
            'description'   => 'required|string|min:3|max:255',
            'city'          => 'required|string|min:3|max:100',
            'state'         => 'required|string|min:2|max:2',
            'company'       => 'required|string|min:3|max:255',
            'stacks'        => 'sometimes|string|min:3|max:255',
            'salary'        => 'sometimes|string|numeric',
            'type'          => ['required', Rule::enum(VacancyTypeEnum::class)],
            'contract_type' => ['required', Rule::enum(VacancyContractTypeEnum::class)],
            'location'      => ['required', Rule::enum(VacancyLocationEnum::class)],
        ];
    }

    protected function messages(): array
    {
        return [
            'title.required'         => 'O Título é Obrigatório.',
            'title.min'              => 'O Título deve ter no mínimo 3 caracteres.',
            'title.max'              => 'O Título deve ter no máximo 255 caracteres.',
            'description.required'   => 'A Descrição é Obrigatória.',
            'description.min'        => 'A Descrição deve ter no mínimo 3 caracteres.',
            'description.max'        => 'A Descrição deve ter no máximo 255 caracteres.',
            'city.required'          => 'A Cidade é Obrigatória.',
            'city.min'               => 'A Cidade deve ter no mínimo 3 caracteres.',
            'city.max'               => 'A Cidade deve ter no máximo 100 caracteres.',
            'company.required'       => 'A Empresa é Obrigatória.',
            'company.min'            => 'A Empresa deve ter no mínimo 3 caracteres.',
            'company.max'            => 'A Empresa deve ter no máximo 255 caracteres.',
            'stacks.min'             => 'As Stacks devem ter no mínimo 3 caracteres.',
            'stacks.max'             => 'As Stacks devem ter no máximo 255 caracteres.',
            'salary.numeric'         => 'Apenas números são permitidos no campo de salário',
            'type.required'          => 'O Tipo de Vaga é Obrigatório.',
            'contract_type.required' => 'O Tipo de Contrato é Obrigatório.',
            'location.required'      => 'A Modalidade de Trabalho é Obrigatória.',
        ];
    }
}
