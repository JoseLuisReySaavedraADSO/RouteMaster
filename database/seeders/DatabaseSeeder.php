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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $jsonData = json_decode(file_get_contents('resources/json/data.json'), true);
        foreach ($jsonData['ubicaciones'] as $ubicacionData) {
            location::create([
                'nombre' => $ubicacionData['nombre'],
                'posX' => $ubicacionData['posX'],
                'posY' => $ubicacionData['posY'],
            ]);
        };
        $locationController = new LocationController();
        $locationController->connections();
    }
}
