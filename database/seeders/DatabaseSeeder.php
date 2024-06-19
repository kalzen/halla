<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create a schedule with 7 stages
        $schedule = Schedule::create([
            'date' => now()->format('Y-m-d'),
        ]);

        for ($i = 1; $i <= 7; $i++) {
            $stage = Stage::create([
                'name' => 'Stage' . $i,
                'schedule_id' => $schedule->id,
            ]);
        }
    }
}
