<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(5),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'company' => $this->faker->company(),
            'stacks' => $this->faker->randomElement(['php7.4', 'laravel', 'symfony', 'codeigniter', 'cakephp', 'laminas', 'yii', 'wordpress', 'zend']),
            'salary' => $this->faker->randomElement([2000, 3500, 5000, 7000]),
            'type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'temporary']),
            'contract_type' => $this->faker->randomElement(['pj', 'clt', 'trainee']),
            'location' => $this->faker->randomElement(['remote', 'hybrid', 'on-site']),
        ];
    }
}
