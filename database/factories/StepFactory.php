<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tracking;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Step>
 */
class StepFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tracking_id' => Tracking::factory(), // Gera um Tracking automaticamente
            'description' => $this->faker->sentence(),
        ];
    }
}
