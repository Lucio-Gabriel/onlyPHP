<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vacancy;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name'     => 'admin',
        //     'email'    => 'admin@admin.com',
        //     'password' => 'admin',
        // ]);

        Vacancy::factory(10)->create();
    }
}
