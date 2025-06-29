<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('123456'),
        ]);

        $this->call([
            CustomerSeeder::class,
            TrackingSeeder::class,
            StepSeeder::class,
        ]);
    }
}
