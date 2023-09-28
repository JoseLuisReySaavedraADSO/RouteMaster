<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\location;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function prueba()
    {
        // Ruta al archivo JSON con todas las ubicaciones y conexiones
        $jsonDataPath = '../resources/json/data.json';

        // Verifica si el archivo JSON existe
        if (file_exists($jsonDataPath)) {
            $jsonData = json_decode(file_get_contents($jsonDataPath), true);

            // Verifica si el archivo contiene ubicaciones
            if (isset($jsonData['ubicaciones'])) {
                foreach ($jsonData['ubicaciones'] as $ubicacionData) {
                    Location::create([
                        'nombre' => $ubicacionData['nombre'],
                        'posX' => $ubicacionData['posX'],
                        'posY' => $ubicacionData['posY'],
                    ]);
                }
            }

            // Verifica si el archivo contiene conexiones
            if (isset($jsonData['conexiones'])) {
                foreach ($jsonData['conexiones'] as $conexionData) {
                    // Aquí debes buscar las ubicaciones correspondientes por nombre y obtener sus IDs
                    $ubicacion1 = Location::where('nombre', $conexionData['ubicacion1'])->first();
                    $ubicacion2 = Location::where('nombre', $conexionData['ubicacion2'])->first();

                    if ($ubicacion1 && $ubicacion2) {
                        Connection::create([
                            'ubicacion1_id' => $ubicacion1->id,
                            'ubicacion2_id' => $ubicacion2->id,
                            'peso' => $conexionData['peso'],
                        ]);
                    }
                }
            }

            $locationController = new LocationController();
            // $locationController->connections();
            // Después de agregar los datos, redirige al usuario a la página de inicio
            return redirect('/home');
        } else {
            // Maneja el caso en el que el archivo JSON no existe
            return redirect('/home')->with('error', 'El archivo JSON no existe');
        }
    }

    public function basico()
    {
        // Ruta al archivo JSON con todas las ubicaciones y conexiones
        $jsonDataPath = '../resources/json/basico.json';

        // Verifica si el archivo JSON existe
        if (file_exists($jsonDataPath)) {
            $jsonData = json_decode(file_get_contents($jsonDataPath), true);

            // Verifica si el archivo contiene ubicaciones
            if (isset($jsonData['ubicaciones'])) {
                foreach ($jsonData['ubicaciones'] as $ubicacionData) {
                    Location::create([
                        'nombre' => $ubicacionData['nombre'],
                        'posX' => $ubicacionData['posX'],
                        'posY' => $ubicacionData['posY'],
                    ]);
                }
            }

            // Verifica si el archivo contiene conexiones
            if (isset($jsonData['conexiones'])) {
                foreach ($jsonData['conexiones'] as $conexionData) {
                    // Aquí debes buscar las ubicaciones correspondientes por nombre y obtener sus IDs
                    $ubicacion1 = Location::where('nombre', $conexionData['ubicacion1'])->first();
                    $ubicacion2 = Location::where('nombre', $conexionData['ubicacion2'])->first();

                    if ($ubicacion1 && $ubicacion2) {
                        Connection::create([
                            'ubicacion1_id' => $ubicacion1->id,
                            'ubicacion2_id' => $ubicacion2->id,
                            'peso' => $conexionData['peso'],
                        ]);
                    }
                }
            }
            $locationController = new LocationController();
            // $locationController->connections();
            // Después de agregar los datos, redirige al usuario a la página de inicio
            return redirect('/home');
        } else {
            // Maneja el caso en el que el archivo JSON no existe
            return redirect('/home')->with('error', 'El archivo JSON no existe');
        }
    }

    public function medio()
    {
        // Ruta al archivo JSON con todas las ubicaciones y conexiones
        $jsonDataPath = '../resources/json/medio.json';

        // Verifica si el archivo JSON existe
        if (file_exists($jsonDataPath)) {
            $jsonData = json_decode(file_get_contents($jsonDataPath), true);

            // Verifica si el archivo contiene ubicaciones
            if (isset($jsonData['ubicaciones'])) {
                foreach ($jsonData['ubicaciones'] as $ubicacionData) {
                    Location::create([
                        'nombre' => $ubicacionData['nombre'],
                        'posX' => $ubicacionData['posX'],
                        'posY' => $ubicacionData['posY'],
                    ]);
                }
            }

            // Verifica si el archivo contiene conexiones
            if (isset($jsonData['conexiones'])) {
                foreach ($jsonData['conexiones'] as $conexionData) {
                    // Aquí debes buscar las ubicaciones correspondientes por nombre y obtener sus IDs
                    $ubicacion1 = Location::where('nombre', $conexionData['ubicacion1'])->first();
                    $ubicacion2 = Location::where('nombre', $conexionData['ubicacion2'])->first();

                    if ($ubicacion1 && $ubicacion2) {
                        Connection::create([
                            'ubicacion1_id' => $ubicacion1->id,
                            'ubicacion2_id' => $ubicacion2->id,
                            'peso' => $conexionData['peso'],
                        ]);
                    }
                }
            }
            $locationController = new LocationController();
            // $locationController->connections();
            // Después de agregar los datos, redirige al usuario a la página de inicio
            return redirect('/home');
        } else {
            // Maneja el caso en el que el archivo JSON no existe
            return redirect('/home')->with('error', 'El archivo JSON no existe');
        }
    }

}
