<?php

namespace Database\Factories;

use App\Models\Agency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nip' => fake()->numberBetween(100000000, 999999999),
            'user_id' => User::factory()->state(['role_id' => 3])->create()->id,
            'agency_id' => Agency::inRandomOrder()->first()->id,
        ];
    }
}
