<?php

use App\Livewire\Candidate\ApplyToVacancy;
use App\Models\User;
use App\Models\Vacancy;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

it('should be able to apply to a Vacancy', function (): void {
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

    $vacancy->refresh();
    $applier = $vacancy->appliers()->first();

    expect($applier)->toBeInstanceOf(User::class)
        ->and($applier->id)
        ->toBe($candidate->id)
        ->and($applier->email)
        ->toBe($candidate->email);

});

it('should not apply twice at the same vacancy', function (): void {
    $candidate = User::factory()->create();
    $vacancy = Vacancy::factory()->create();

    for ($i = 0; $i <= 2; $i++) {
        Livewire::actingAs($candidate)
            ->test(ApplyToVacancy::class, ['vacancy' => $vacancy])
            ->call('apply')
            ->assertHasNoErrors()
            ->assertRedirectToRoute('index');

    }
    assertDatabaseCount('user_vacancy', 1);
    assertDatabaseHas('user_vacancy', [
        'vacancy_id' => $vacancy->getKey(),
        'user_id'    => $candidate->getKey(),
    ]);

});
