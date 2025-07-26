<?php

use App\Livewire\Recruiter\Vacancy\ListVacancy;
use App\Models\User;
use App\Models\Vacancy;
use Livewire\Livewire;

it('should list vacancies that belongs to the recruiter', function () {
    $recruiter = User::factory()->recruiter()->create();
    $vacancies = Vacancy::factory()->for($recruiter, 'owner')->count(10)->create();

    $component = Livewire::actingAs($recruiter)
        ->test(ListVacancy::class)
        ->assertSuccessful();
    $vacancies->each(function (Vacancy $vacancy) use ($component) {
        $component->assertSee($vacancy->title);
        $component->assertSee($vacancy->stacks);
        $component->assertSee($vacancy->city);
        $component->assertSee(strtoupper($vacancy->state));
        $component->assertSee($vacancy->company);
        $component->assertSee($vacancy->contract_type);
        $component->assertSee($vacancy->location);
        $component->assertSee($vacancy->created_at);
    });
});

it('should paginate vacancies that belongs to the recruiter', function () {
    $recruiter = User::factory()->recruiter()->create();
    $vacancies = Vacancy::factory()->for($recruiter, 'owner')->count(10)->create();

    $component = Livewire::actingAs($recruiter)
        ->test(ListVacancy::class)
        ->assertSuccessful();
    $vacancies->each(function (Vacancy $vacancy) use ($component) {
        $component->assertSee($vacancy->title);
        $component->assertSee($vacancy->stacks);
        $component->assertSee($vacancy->city);
        $component->assertSee(strtoupper($vacancy->state));
        $component->assertSee($vacancy->company);
        $component->assertSee($vacancy->contract_type);
        $component->assertSee($vacancy->location);
        $component->assertSee($vacancy->created_at);
    });
    $component->assertDontSee('Previous');
    $component->assertDontSee('Next');

    Vacancy::factory()->for($recruiter, 'owner')->count(2)->create();
    $component->refresh();

    $component->assertSee('Previous');
    $component->assertSee('Next');
});
