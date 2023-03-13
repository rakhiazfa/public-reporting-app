<?php

namespace Database\Factories;

use App\Models\Society;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SocietyLocation>
 */
class SocietyLocationFactory extends Factory
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
            'sub_district' => fake()->city(),
            'urban_village' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'address' => fake()->streetAddress(),
            'society_id' => Society::factory()->create()->id,
        ];
    }
}
