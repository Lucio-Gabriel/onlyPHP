<?php

use App\Enums\Vacancy\VacancyContractTypeEnum;
use App\Enums\Vacancy\VacancyLocationEnum;
use App\Enums\Vacancy\VacancyTypeEnum;
use App\Livewire\Recruiter\Vacancy\CreateVacancy;
use App\Models\User;
use App\Models\Vacancy;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

it('should create a vacancy being a recruiter', function (): void {
    $recruiter = User::factory()->create();

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
