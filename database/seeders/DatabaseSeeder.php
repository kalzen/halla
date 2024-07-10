<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'halla@gmail.com',
            'password' => Hash::make('123123'),
        ]);

        $this->createSettings();
    }

    private function createSettings()
    {
        try {
            for ($i = 1; $i <= 7; $i++) {
                Setting::create([
                    'name' => 'Stage' . $i,
                    'type' => 'image',
                ]);
                Setting::create([
                    'name' => 'Stage' . $i,
                    'type' => 'video',
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Error creating settings: ' . $e->getMessage());
            throw $e;
        }
    }
}
