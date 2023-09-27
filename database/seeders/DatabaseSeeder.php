<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\LocationController;
use App\Models\location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Jose Rey',
            'email' => 'joslrey@misena.edu.co',
            'password' => '$2y$10$30ZQjH0r3Zo6FzgLY05.5uADvjxtGSTvZgoKYpc2lWj0e5fV3J5U.',
            'email_verified_at' => '2023-09-27 20:29:24',
        ]);
    }
}
