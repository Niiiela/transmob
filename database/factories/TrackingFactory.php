<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tracking>
 */
class TrackingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'origin' => $this->faker->city(),
            'destination' => $this->faker->city(),
            'tracker_code' => strtoupper($this->faker->unique()->bothify('TRK-####??')),
            'status' => $this->faker->randomElement(['Entregue', 'Andamento', 'Não entregue']),
            'sender_id' => \App\Models\Customer::factory(),     
            'destination_id' => \App\Models\Customer::factory(), 
        ];
    }
}
