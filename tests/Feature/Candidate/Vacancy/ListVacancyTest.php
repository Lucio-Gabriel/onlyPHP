<?php

use App\Livewire\Candidate\Index;
use App\Models\User;
use App\Models\Vacancy;
use Livewire\Livewire;

it('should list vacancies', function () {
    $vacancies = Vacancy::factory()->count(6)->create();
    $component = Livewire::actingAs(User::factory()->createOne())
        ->test(Index::class)
        ->assertHasNoErrors();

    $vacancies->each(function (Vacancy $vacancy) use ($component) {
        $component->assertSee($vacancy->title);
        $component->assertSee($vacancy->company);
        $component->assertSee($vacancy->stacks);
        $component->assertSee($vacancy->city);
        $component->assertSee($vacancy->state);
        $component->assertSee($vacancy->contract_type);
        $component->assertSee($vacancy->location);
        $component->assertSee($vacancy->created_at);
    });
});
