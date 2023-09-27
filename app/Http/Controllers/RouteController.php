<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\location;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function calculate(Request $request)
    {
        $startLocationId = $request->input('startLocation');

        // Obtener la ubicación de inicio
        $startLocation = Location::find($startLocationId);

        // Obtener todas las conexiones desde y hacia la ubicación de inicio
        $connectionsFromStartLocation = $startLocation->connectionsFrom;
        $connectionsToStartLocation = $startLocation->connectionsTo;

        // Crear un array para almacenar las ubicaciones en el orden de la ruta
        $route = [];

        // Agregar la ubicación de inicio a la ruta
        $currentLocationId = $startLocationId;
        $route[] = $currentLocationId;

        // Calcular la ruta

        $locations = Location::get();
        $stopCondition = count($locations);

        while (count($route) < $stopCondition) {
            $minDistance = PHP_FLOAT_MAX;
            $nextLocationId = null;

            // Encuentra la próxima ubicación más cercana
            foreach ($connectionsFromStartLocation as $connection) {
                $distance = $connection->peso;

                if ($distance < $minDistance && !in_array($connection->ubicacion2_id, $route)) {
                    $minDistance = $distance;
                    $nextLocationId = $connection->ubicacion2_id;
                }
            }

            // Si no se encontró una conexión desde la ubicación de inicio, busca en las conexiones hacia la ubicación de inicio
            if ($nextLocationId === null) {
                foreach ($connectionsToStartLocation as $connection) {
                    $distance = $connection->peso;

                    if ($distance < $minDistance && !in_array($connection->ubicacion1_id, $route)) {
                        $minDistance = $distance;
                        $nextLocationId = $connection->ubicacion1_id;
                    }
                }
            }

            // Agregar la ubicación más cercana a la ruta
            $route[] = $nextLocationId;

            // Actualizar la ubicación actual
            $currentLocationId = $nextLocationId;

            // Obtener las conexiones desde la ubicación actual
            $currentLocation = Location::find($currentLocationId);
            $connectionsFromCurrentLocation = $currentLocation->connectionsFrom;
            $connectionsToCurrentLocation = $currentLocation->connectionsTo;

            // Combina las conexiones desde y hacia la ubicación actual
            $connectionsFromStartLocation = $connectionsFromStartLocation->concat($connectionsToCurrentLocation);
        }

        // Agregar la ubicación de inicio nuevamente para completar el ciclo
        $route[] = $startLocationId;

        // $route contiene la secuencia de ubicaciones en la ruta óptima
        // dd($route);

        return view('home', compact('route'));
    }

}
