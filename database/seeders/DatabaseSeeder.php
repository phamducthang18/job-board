<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
use App\Models\Employer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Users
        User::factory(300)->create();

        // Shuffle users for assigning to employers
        $users = User::all()->shuffle();

        // Seed Employers
        for ($i = 0; $i < 20; $i++) {
            if ($users->isEmpty()) break; // Prevent popping from empty collection

            Employer::factory()->create([
                'user_id' => $users->pop()->id,
            ]);
        }

        // Get all employers
        $employers = Employer::all();

        // Seed Jobs
        for ($i = 0; $i < 100; $i++) {
            Job::factory()->create([
                'employer_id' => $employers->random()->id,
            ]);
        }
    }
}
