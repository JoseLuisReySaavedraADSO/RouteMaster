<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\location;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function calculateRoute(Request $request)
    {
        dd($request);
        $startLocationId = $request->input('startLocation');
        $locations = location::get();

        // Obtener todas las conexiones
        $connections = Connection::get();

        // Crear un array para almacenar las ubicaciones en el orden de la ruta
        $route = [];

        // Agregar la ubicación de inicio a la ruta
        $currentLocationId = $startLocationId;
        $route[] = $currentLocationId;

        // Eliminar la conexión que contiene la ubicación de inicio
        $connections = $connections->filter(function ($connection) use ($currentLocationId) {
            return $connection->ubicacion1_id !== $currentLocationId;
        });

        // Calcular la ruta
        while (!$connections->isEmpty()) {
            $minDistance = PHP_FLOAT_MAX;
            $nextLocationId = null;

            foreach ($connections as $connection) {
                if ($connection->ubicacion1_id === $currentLocationId) {
                    $distance = $connection->peso;
                    if ($distance < $minDistance) {
                        $minDistance = $distance;
                        $nextLocationId = $connection->ubicacion2_id;
                    }
                } elseif ($connection->ubicacion2_id === $currentLocationId) {
                    $distance = $connection->peso;
                    if ($distance < $minDistance) {
                        $minDistance = $distance;
                        $nextLocationId = $connection->ubicacion1_id;
                    }
                }
            }

            // Agregar la ubicación más cercana a la ruta
            $route[] = $nextLocationId;

            // Eliminar la conexión que contiene la ubicación actual
            $connections = $connections->filter(function ($connection) use ($currentLocationId) {
                return $connection->ubicacion1_id !== $currentLocationId && $connection->ubicacion2_id !== $currentLocationId;
            });

            $currentLocationId = $nextLocationId;
        }

        // Agregar la ubicación de inicio nuevamente para completar el ciclo
        $route[] = $startLocationId;

        // $route contiene la secuencia de ubicaciones en la ruta óptima

        return view('home', compact('route'));
    }
}

