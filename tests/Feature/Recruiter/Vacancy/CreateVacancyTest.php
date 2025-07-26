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
        ->set('title', 'vacancy-title')
        ->assertSet('title', 'vacancy-title')
        ->set('description', 'vacancy-description')
        ->assertSet('description', 'vacancy-description')
        ->set('city', 'vacancy-city')
        ->assertSet('city', 'vacancy-city')
        ->set('stacks', 'Laravel')
        ->assertSet('stacks', 'Laravel')
        ->set('state', 'SP')
        ->assertSet('state', 'SP')
        ->set('company', 'vacancy-company')
        ->assertSet('company', 'vacancy-company')
        ->set('salary', '5000')
        ->assertSet('salary', '5000')
        ->set('type', VacancyTypeEnum::FullTime)
        ->assertSet('type', VacancyTypeEnum::FullTime->value)
        ->set('contract_type', VacancyContractTypeEnum::Clt)
        ->assertSet('contract_type', VacancyContractTypeEnum::Clt->value)
        ->set('location', VacancyLocationEnum::Remote)
        ->assertSet('location', VacancyLocationEnum::Remote->value)
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
        ->set('title', 'vacancy-title')
        ->assertSet('title', 'vacancy-title')
        ->set('description', 'vacancy-description')
        ->assertSet('description', 'vacancy-description')
        ->set('city', 'vacancy-city')
        ->assertSet('city', 'vacancy-city')
        ->set('stacks', 'Laravel')
        ->assertSet('stacks', 'Laravel')
        ->set('state', 'SP')
        ->assertSet('state', 'SP')
        ->set('company', 'vacancy-company')
        ->assertSet('company', 'vacancy-company')
        ->set('salary', '5000')
        ->assertSet('salary', '5000')
        ->set('type', VacancyTypeEnum::FullTime)
        ->assertSet('type', VacancyTypeEnum::FullTime->value)
        ->set('contract_type', VacancyContractTypeEnum::Clt)
        ->assertSet('contract_type', VacancyContractTypeEnum::Clt->value)
        ->set('location', VacancyLocationEnum::Remote)
        ->assertSet('location', VacancyLocationEnum::Remote->value)
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
            ->set('title', $value)
            ->call('save')
            ->assertHasErrors(['title' => $rule]);
    })->with([
        'required' => ['', 'O Título é Obrigatório.'],
        'min:3'    => ['aa', 'O Título deve ter no mínimo 3 caracteres.'],
        'max:255'  => [str_repeat('*', 256), 'O Título deve ter no máximo 255 caracteres.'],
    ]);

    test('description::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('description', $value)
            ->call('save')
            ->assertHasErrors(['description' => $rule]);
    })->with([
        'required' => ['', 'A Descrição é Obrigatória.'],
        'min:3'    => ['aa', 'A Descrição deve ter no mínimo 3 caracteres.'],
        'max:255'  => [str_repeat('*', 256), 'A Descrição deve ter no máximo 255 caracteres.'],
    ]);

    test('city::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('city', $value)
            ->call('save')
            ->assertHasErrors(['city' => $rule]);
    })->with([
        'required' => ['', 'A Cidade é Obrigatória.'],
        'min:3'    => ['aa', 'A Cidade deve ter no mínimo 3 caracteres.'],
        'max:100'  => [str_repeat('*', 101), 'A Cidade deve ter no máximo 100 caracteres.'],
    ]);

    test('company::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('company', $value)
            ->call('save')
            ->assertHasErrors(['company' => $rule]);
    })->with([
        'required' => ['', 'A Empresa é Obrigatória.'],
        'min:3'    => ['aa', 'A Empresa deve ter no mínimo 3 caracteres.'],
        'max:255'  => [str_repeat('*', 256), 'A Empresa deve ter no máximo 255 caracteres.'],
    ]);

    test('stacks::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('stacks', $value)
            ->call('save')
            ->assertHasErrors(['stacks' => $rule]);
    })->with([
        'min:3'   => ['aa', 'As Stacks devem ter no mínimo 3 caracteres.'],
        'max:255' => [str_repeat('*', 256), 'As Stacks devem ter no máximo 255 caracteres.'],
    ]);

    test('salary::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('salary', $value)
            ->call('save')
            ->assertHasErrors(['salary' => $rule]);
    })->with([
        'numeric' => ['ahhahahah', 'Apenas números são permitidos no campo de salário'],
    ]);

    test('type::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('type', $value)
            ->call('save')
            ->assertHasErrors(['type' => $rule]);
    })->with([
        'required' => ['', 'O Tipo de Vaga é Obrigatório.'],
    ]);

    test('contract_type::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('contract_type', $value)
            ->call('save')
            ->assertHasErrors(['contract_type' => $rule]);
    })->with([
        'required' => ['', 'O Tipo de Contrato é Obrigatório.'],
    ]);

    test('location::validation', function ($value, $rule): void {
        Livewire::test(CreateVacancy::class)
            ->set('location', $value)
            ->call('save')
            ->assertHasErrors(['location' => $rule]);
    })->with([
        'required' => ['', 'A Modalidade de Trabalho é Obrigatória.'],
    ]);
});
