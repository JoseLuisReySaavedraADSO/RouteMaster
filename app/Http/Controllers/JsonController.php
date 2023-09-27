<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function prueba() {
        $jsonData = json_decode(file_get_contents('../resources/json/data.json'), true);
        foreach ($jsonData['ubicaciones'] as $ubicacionData) {
            location::create([
                'nombre' => $ubicacionData['nombre'],
                'posX' => $ubicacionData['posX'],
                'posY' => $ubicacionData['posY'],
            ]);
        };
        $locations = location::all();
        return redirect('/home');
    }

    public function basico() {
        $jsonData = json_decode(file_get_contents('../resources/json/basico.json'), true);
        foreach ($jsonData['ubicaciones'] as $ubicacionData) {
            location::create([
                'nombre' => $ubicacionData['nombre'],
                'posX' => $ubicacionData['posX'],
                'posY' => $ubicacionData['posY'],
            ]);
        };
        $locations = location::all();
        return redirect('/home');
        // $locationController = new LocationController();
        // $locationController->connections();
    }

    public function medio() {
        $jsonData = json_decode(file_get_contents('../resources/json/medio.json'), true);
        foreach ($jsonData['ubicaciones'] as $ubicacionData) {
            location::create([
                'nombre' => $ubicacionData['nombre'],
                'posX' => $ubicacionData['posX'],
                'posY' => $ubicacionData['posY'],
            ]);
        };
        $locations = location::all();

        return redirect('/home');
        // $locationController = new LocationController();
        // $locationController->connections();
    }


}
