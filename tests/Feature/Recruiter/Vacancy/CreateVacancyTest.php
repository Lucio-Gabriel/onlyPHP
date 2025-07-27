<?php

use App\Enums\Vacancy\VacancyContractTypeEnum;
use App\Enums\Vacancy\VacancyLocationEnum;
use App\Enums\Vacancy\VacancyTypeEnum;
use App\Livewire\Recruiter\Vacancy\CreateVacancy;
use App\Models\User;
use App\Models\Vacancy;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

it('should create a vacancy being a recruiter', function (): void {
    $recruiter = User::factory()->recruiter()->create();

    Livewire::actingAs($recruiter)
        ->test(CreateVacancy::class)
        ->set('form.title', 'vacancy-title')
        ->assertSet('form.title', 'vacancy-title')
        ->set('form.description', 'vacancy-description')
        ->assertSet('form.description', 'vacancy-description')
        ->set('form.city', 'vacancy-city')
        ->assertSet('form.city', 'vacancy-city')
        ->set('form.stacks', 'Laravel')
        ->assertSet('form.stacks', 'Laravel')
        ->set('form.state', 'SP')
        ->assertSet('form.state', 'SP')
        ->set('form.company', 'vacancy-company')
        ->assertSet('form.company', 'vacancy-company')
        ->set('form.salary', '5000')
        ->assertSet('form.salary', '5000')
        ->set('form.type', VacancyTypeEnum::FullTime)
        ->assertSet('form.type', VacancyTypeEnum::FullTime->value)
        ->set('form.contract_type', VacancyContractTypeEnum::Clt)
        ->assertSet('form.contract_type', VacancyContractTypeEnum::Clt->value)
        ->set('form.location', VacancyLocationEnum::Remote)
        ->assertSet('form.location', VacancyLocationEnum::Remote->value)
        ->assertHasNoErrors()
        ->call('save');

    assertDatabaseCount(Vacancy::class, 1);
    assertDatabaseHas(Vacancy::class, [
        'title'         => 'vacancy-title',
        'description'   => 'vacancy-description',
        'city'          => 'vacancy-city',
        'state'         => 'SP',
        'company'       => 'vacancy-company',
        'salary'        => '5000',
        'type'          => 'full-time',
        'contract_type' => 'clt',
        'location'      => 'remote',
    ]);

});

test('candidate cannot create a vacancy', function (): void {
    $candidate = User::factory()->candidate()->create();

    Livewire::actingAs($candidate)
        ->test(CreateVacancy::class)
        ->set('form.title', 'vacancy-title')
        ->assertSet('form.title', 'vacancy-title')
        ->set('form.description', 'vacancy-description')
        ->assertSet('form.description', 'vacancy-description')
        ->set('form.city', 'vacancy-city')
        ->assertSet('form.city', 'vacancy-city')
        ->set('form.stacks', 'Laravel')
        ->assertSet('form.stacks', 'Laravel')
        ->set('form.state', 'SP')
        ->assertSet('form.state', 'SP')
        ->set('form.company', 'vacancy-company')
        ->assertSet('form.company', 'vacancy-company')
        ->set('form.salary', '5000')
        ->assertSet('form.salary', '5000')
        ->set('form.type', VacancyTypeEnum::FullTime)
        ->assertSet('form.type', VacancyTypeEnum::FullTime->value)
        ->set('form.contract_type', VacancyContractTypeEnum::Clt)
        ->assertSet('form.contract_type', VacancyContractTypeEnum::Clt->value)
        ->set('form.location', VacancyLocationEnum::Remote)
        ->assertSet('form.location', VacancyLocationEnum::Remote->value)
        ->call('save')
        ->assertForbidden();

    assertDatabaseCount(Vacancy::class, 0);
    assertDatabaseMissing(Vacancy::class, [
        'title'         => 'vacancy-title',
        'description'   => 'vacancy-description',
        'city'          => 'vacancy-city',
        'state'         => 'SP',
        'company'       => 'vacancy-company',
        'salary'        => '5000',
        'type'          => 'full-time',
        'contract_type' => 'clt',
        'location'      => 'remote',
    ]);
});

describe('validation tests', function () {
    beforeEach(function () {
        actingAs(User::factory()->recruiter()->create());
    });

    test('title::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('form.title', $value)
            ->call('save')
            ->assertHasErrors(['form.title' => $rule]);
    })->with([
        'required' => ['', 'O Título é Obrigatório.'],
        'min:3'    => ['aa', 'O Título deve ter no mínimo 3 caracteres.'],
        'max:255'  => [str_repeat('*', 256), 'O Título deve ter no máximo 255 caracteres.'],
    ]);

    test('description::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('form.description', $value)
            ->call('save')
            ->assertHasErrors(['form.description' => $rule]);
    })->with([
        'required' => ['', 'A Descrição é Obrigatória.'],
        'min:3'    => ['aa', 'A Descrição deve ter no mínimo 3 caracteres.'],
        'max:255'  => [str_repeat('*', 256), 'A Descrição deve ter no máximo 255 caracteres.'],
    ]);

    test('city::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('form.city', $value)
            ->call('save')
            ->assertHasErrors(['form.city' => $rule]);
    })->with([
        'required' => ['', 'A Cidade é Obrigatória.'],
        'min:3'    => ['aa', 'A Cidade deve ter no mínimo 3 caracteres.'],
        'max:100'  => [str_repeat('*', 101), 'A Cidade deve ter no máximo 100 caracteres.'],
    ]);

    test('company::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('form.company', $value)
            ->call('save')
            ->assertHasErrors(['form.company' => $rule]);
    })->with([
        'required' => ['', 'A Empresa é Obrigatória.'],
        'min:3'    => ['aa', 'A Empresa deve ter no mínimo 3 caracteres.'],
        'max:255'  => [str_repeat('*', 256), 'A Empresa deve ter no máximo 255 caracteres.'],
    ]);

    test('stacks::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('form.stacks', $value)
            ->call('save')
            ->assertHasErrors(['form.stacks' => $rule]);
    })->with([
        'min:3'   => ['aa', 'As Stacks devem ter no mínimo 3 caracteres.'],
        'max:255' => [str_repeat('*', 256), 'As Stacks devem ter no máximo 255 caracteres.'],
    ]);

    test('salary::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('form.salary', $value)
            ->call('save')
            ->assertHasErrors(['form.salary' => $rule]);
    })->with([
        'numeric' => ['ahhahahah', 'Apenas números são permitidos no campo de salário'],
    ]);

    test('type::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('form.type', $value)
            ->call('save')
            ->assertHasErrors(['form.type' => $rule]);
    })->with([
        'required' => ['', 'O Tipo de Vaga é Obrigatório.'],
    ]);

    test('contract_type::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('form.contract_type', $value)
            ->call('save')
            ->assertHasErrors(['form.contract_type' => $rule]);
    })->with([
        'required' => ['', 'O Tipo de Contrato é Obrigatório.'],
    ]);

    test('location::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('form.location', $value)
            ->call('save')
            ->assertHasErrors(['form.location' => $rule]);
    })->with([
        'required' => ['', 'A Modalidade de Trabalho é Obrigatória.'],
    ]);
});
