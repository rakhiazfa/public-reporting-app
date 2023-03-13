<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Society>
 */
class SocietyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $genders = ['Pria', 'Wanita'];

        return [
            'nik' => fake()->numberBetween(100000000, 999999999),
            'name' => fake()->name(),
            'date_of_birth' => fake()->date(),
            'gender' => $genders[array_rand($genders)],
            'phone' => fake()->phoneNumber(),
            'job_id' => Job::inRandomOrder()->first()->id,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
