<?php

use App\Livewire\Candidate\ApplyToVacancy;
use App\Models\User;
use App\Models\Vacancy;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

it('should be able to apply to a Vacancy', function () {
    $candidate = User::factory()->create();
    $vacancy = Vacancy::factory()->create();

    Livewire::actingAs($candidate)
        ->test(ApplyToVacancy::class, ['vacancy' => $vacancy])
        ->call('apply')
        ->assertHasNoErrors()
        ->assertRedirectToRoute('index');

    assertDatabaseCount('user_vacancy', 1);
    assertDatabaseHas('user_vacancy', [
        'vacancy_id' => $vacancy->getKey(),
        'user_id'    => $candidate->getKey(),
    ]);

});
