<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tracking;

class TrackingSeeder extends Seeder
{
    public function run(): void
    {
        Tracking::factory(10)->create();
    }
}
