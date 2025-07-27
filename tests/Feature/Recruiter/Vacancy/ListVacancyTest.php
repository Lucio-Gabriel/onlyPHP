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

test('only the owner can see the vacancies', function () {
    $recruiter = User::factory()->recruiter()->create();
    $wrongUser = User::factory()->recruiter()->create();
    $vacancies = Vacancy::factory()->for($recruiter, 'owner')->count(10)->create();

    $component = Livewire::actingAs($wrongUser)
        ->test(ListVacancy::class)
        ->assertSuccessful();
    $vacancies->each(function (Vacancy $vacancy) use ($component) {
        $component->assertDontSee($vacancy->title);
        $component->assertDontSee($vacancy->stacks);
        $component->assertDontSee($vacancy->city);
        $component->assertDontSee(strtoupper($vacancy->state));
        $component->assertDontSee($vacancy->company);
        $component->assertDontSee($vacancy->contract_type);
        $component->assertDontSee($vacancy->location);
        $component->assertDontSee($vacancy->created_at);
    });
    $component->assertSee('Nenhuma Vaga Cadastrada Em Seu Perfil');

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
