<?php

use App\Livewire\Recruiter\Vacancy\DeleteVacancy;
use App\Models\User;
use App\Models\Vacancy;
use Livewire\Livewire;

use function Pest\Laravel\assertNotSoftDeleted;
use function Pest\Laravel\assertSoftDeleted;

it('should soft delete a vacancy', function (): void {
    $recruiter = User::factory()->recruiter()->createOne();
    $vacancy = Vacancy::factory()->for($recruiter, 'owner')->createOne();

    Livewire::actingAs($recruiter)
        ->test(DeleteVacancy::class, ['vacancy' => $vacancy])
        ->call('destroy')
        ->assertHasNoErrors();

    assertsoftDeleted($vacancy);
});

test('only the owner can delete a vacancy', function (): void {
    $recruiter = User::factory()->recruiter()->createOne();
    $wrongUser = User::factory()->recruiter()->createOne();
    $vacancy = Vacancy::factory()->for($recruiter, 'owner')->createOne();

    Livewire::actingAs($wrongUser)
        ->test(DeleteVacancy::class, ['vacancy' => $vacancy])
        ->call('destroy')
        ->assertForbidden();

    assertNotSoftDeleted($vacancy);

    Livewire::actingAs($recruiter)
        ->test(DeleteVacancy::class, ['vacancy' => $vacancy])
        ->call('destroy')
        ->assertHasNoErrors();

    assertsoftDeleted($vacancy);
});
