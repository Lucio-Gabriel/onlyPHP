<?php

use App\Enums\Vacancy\VacancyContractTypeEnum;
use App\Enums\Vacancy\VacancyLocationEnum;
use App\Enums\Vacancy\VacancyTypeEnum;
use App\Livewire\Recruiter\Vacancy\EditVacancy;
use App\Models\User;
use App\Models\Vacancy;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

it('should be able to edit a vacancy', function () {
    $recruiter = User::factory()->recruiter()->create();
    $vacancy = Vacancy::factory()->for($recruiter, 'owner')->create();

    Livewire::actingAs($recruiter)
        ->test(EditVacancy::class, ['vacancy' => $vacancy])
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
        ->assertHasNoErrors();

    assertDatabaseCount(Vacancy::class, 1);
    assertDatabaseMissing(Vacancy::class, [
        'title'         => $vacancy->title,
        'description'   => $vacancy->description,
        'city'          => $vacancy->city,
        'stacks'        => $vacancy->stacks,
        'state'         => $vacancy->state,
        'company'       => $vacancy->company,
        'salary'        => $vacancy->salary,
        'type'          => $vacancy->type,
        'contract_type' => $vacancy->contract_type,
        'location'      => $vacancy->location,
    ]);

    assertDatabaseHas(Vacancy::class, [
        'title'         => 'vacancy-title',
        'description'   => 'vacancy-description',
        'city'          => 'vacancy-city',
        'stacks'        => 'Laravel',
        'state'         => 'SP',
        'company'       => 'vacancy-company',
        'salary'        => '5000',
        'type'          => VacancyTypeEnum::FullTime->value,
        'contract_type' => VacancyContractTypeEnum::Clt->value,
        'location'      => VacancyLocationEnum::Remote->value,
    ]);
});
