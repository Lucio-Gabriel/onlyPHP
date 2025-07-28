<?php

use App\Models\User;

use function Pest\Laravel\actingAs;

test('candidate cannot see recruiters navigation items on sidebar', function (): void {
    actingAs(User::factory()->candidate()->create())
        ->get(route('index'))
        ->assertStatus(200)
        ->assertDontSeeText('Suas Vagas')
        ->assertDontSeeText('Criar Vaga');
});

test('recruiter cannot see candidates navigation items on sidebar', function (): void {
    actingAs(User::factory()->recruiter()->create())
        ->get(route('vacancies.index.recruiter'))
        ->assertStatus(200)
        ->assertDontSeeText('Dashboard')
        ->assertDontSeeText('Candidaturas');
});
