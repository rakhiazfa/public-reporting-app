<?php

namespace Database\Factories;

use App\Models\Agency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AgencyLocation>
 */
class AgencyLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'country' => 'Indonesia',
            'province' => fake()->country(),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'address' => fake()->streetAddress(),
            'agency_id' => Agency::inRandomOrder()->first()->id,
        ];
    }
}
