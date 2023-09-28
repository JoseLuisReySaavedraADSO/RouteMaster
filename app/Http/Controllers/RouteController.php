<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\location;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    // public function calculate(Request $request)
    // {
    //     $startLocationId = $request->input('startLocation');

    //     // Obtener la ubicación de inicio
    //     $startLocation = Location::find($startLocationId);

    //     // Obtener todas las conexiones desde y hacia la ubicación de inicio
    //     $connectionsFromStartLocation = $startLocation->connectionsFrom;
    //     $connectionsToStartLocation = $startLocation->connectionsTo;

    //     // Crear un array para almacenar las ubicaciones en el orden de la ruta
    //     $route = [];

    //     // Agregar la ubicación de inicio a la ruta
    //     $currentLocationId = $startLocationId;
    //     $route[] = $currentLocationId;

    //     // Calcular la ruta

    //     $locations = Location::get();
    //     $stopCondition = count($locations);

    //     while (count($route) < $stopCondition) {
    //         $minDistance = PHP_FLOAT_MAX;
    //         $nextLocationId = null;

    //         // Encuentra la próxima ubicación más cercana
    //         foreach ($connectionsFromStartLocation as $connection) {
    //             $distance = $connection->peso;

    //             if ($distance < $minDistance && !in_array($connection->ubicacion2_id, $route)) {
    //                 $minDistance = $distance;
    //                 $nextLocationId = $connection->ubicacion2_id;
    //             }
    //         }

    //         // Si no se encontró una conexión desde la ubicación de inicio, busca en las conexiones hacia la ubicación de inicio
    //         if ($nextLocationId === null) {
    //             foreach ($connectionsToStartLocation as $connection) {
    //                 $distance = $connection->peso;

    //                 if ($distance < $minDistance && !in_array($connection->ubicacion1_id, $route)) {
    //                     $minDistance = $distance;
    //                     $nextLocationId = $connection->ubicacion1_id;
    //                 }
    //             }
    //         }

    //         // Agregar la ubicación más cercana a la ruta
    //         $route[] = $nextLocationId;

    //         // Actualizar la ubicación actual
    //         $currentLocationId = $nextLocationId;

    //         // Obtener las conexiones desde la ubicación actual
    //         $currentLocation = Location::find($currentLocationId);
    //         $connectionsFromCurrentLocation = $currentLocation->connectionsFrom;
    //         $connectionsToCurrentLocation = $currentLocation->connectionsTo;
    //         // dd($connectionsToCurrentLocation);

    //         // Combina las conexiones desde y hacia la ubicación actual
    //         $connectionsFromStartLocation = $connectionsFromStartLocation->concat($connectionsToCurrentLocation);
    //     }

    //     // Agregar la ubicación de inicio nuevamente para completar el ciclo
    //     $route[] = $startLocationId;

    //     // $route contiene la secuencia de ubicaciones en la ruta óptima
    //     // dd($route);

    //     // dd($route);
    //     return redirect()->route('home')->with('route', $route);
    // }

    // public function calculate(Request $request)
    // {
    //     $startLocationName = $request->input('startLocation');
    //     $startLocation = Location::where('id', $startLocationName)->first();

    //     if (!$startLocation) {
    //         return response()->json(['message' => 'Ubicación de inicio no encontrada'], 404);
    //     }

    //     $locations = Location::all();
    //     $visited = [$startLocation->id];
    //     $route = [$startLocation->id];

    //     while (count($visited) < count($locations)) {
    //         $minDistance = INF;
    //         $closestLocationId = null;

    //         foreach ($locations as $location) {
    //             if (!in_array($location->id, $visited)) {
    //                 $lastVisitedLocationId = end($visited);

    //                 // Buscar conexión en ambas direcciones
    //                 $connection1 = Connection::where('ubicacion1_id', $lastVisitedLocationId)
    //                     ->where('ubicacion2_id', $location->id)
    //                     ->first();
    //                 $connection2 = Connection::where('ubicacion1_id', $location->id)
    //                     ->where('ubicacion2_id', $lastVisitedLocationId)
    //                     ->first();

    //                 if ($connection1 && $connection1->peso < $minDistance) {
    //                     $minDistance = $connection1->peso;
    //                     $closestLocationId = $location->id;
    //                 }

    //                 if ($connection2 && $connection2->peso < $minDistance) {
    //                     $minDistance = $connection2->peso;
    //                     $closestLocationId = $location->id;
    //                 }
    //             }
    //         }

    //         if ($closestLocationId) {
    //             $visited[] = $closestLocationId;
    //             $route[] = $closestLocationId;
    //         } else {
    //             // No se pudo encontrar la ubicación más cercana, detener el bucle
    //             break;
    //         }
    //     }


    //     return redirect()->route('home')->with('route', $route);
    // }

    public function calculate(Request $request)
    {
        // Obtener el id de la ubicación de inicio desde la solicitud
        $startLocationName = $request->input('startLocation');

        // Buscar la ubicación de inicio en la base de datos
        $startLocation = Location::where('id', $startLocationName)->first();

        // Si la ubicación de inicio no se encuentra, devolver una respuesta de error
        if (!$startLocation) {
            return response()->alert(['message' => 'Ubicación de inicio no encontrada'], 404);
        }

        // Obtener todas las ubicaciones disponibles en la base de datos
        $locations = Location::all();

        // Inicializar las estructuras de datos para el algoritmo de búsqueda
        $visited = [$startLocation->id]; // Lista de ubicaciones visitadas
        $route = [$startLocation->id]; // Ruta actual
        $totalWeight = 0; // Peso total de la ruta actual
        $shortestRoute = null; // Ruta más corta encontrada
        $shortestWeight = INF; // Peso de la ruta más corta

        // Definir una función anidada que implementa el algoritmo de búsqueda de retroceso
        function backtrack($visited, $route, $totalWeight, $locations, &$shortestRoute, &$shortestWeight)
        {
            if (count($visited) == count($locations)) {
                // Se han visitado todas las ubicaciones, verificar si es la ruta más corta
                if ($totalWeight < $shortestWeight) {
                    $shortestRoute = $route;
                    $shortestWeight = $totalWeight;
                }
                return;
            }

            $lastVisitedLocationId = end($visited);

            foreach ($locations as $location) {
                if (!in_array($location->id, $visited)) {
                    // Buscar la conexión entre la ubicación actual y la última visitada
                    $connection = Connection::where(function ($query) use ($lastVisitedLocationId, $location) {
                        $query->where('ubicacion1_id', $lastVisitedLocationId)
                            ->where('ubicacion2_id', $location->id);
                    })->orWhere(function ($query) use ($lastVisitedLocationId, $location) {
                        $query->where('ubicacion1_id', $location->id)
                            ->where('ubicacion2_id', $lastVisitedLocationId);
                    })->first();

                    if ($connection) {
                        // Crear nuevas copias de las estructuras de datos para la recursión
                        $newVisited = $visited;
                        $newRoute = $route;
                        $newTotalWeight = $totalWeight + $connection->peso;
                        // error_log("Exploración de ruta completa: " . implode(" -> ", $newRoute) . " - Peso total: $newTotalWeight");
                        // dd($route);
                        $newVisited[] = $location->id;
                        $newRoute[] = $location->id;

                        // Llamar recursivamente a la función de retroceso para explorar más
                        backtrack($newVisited, $newRoute, $newTotalWeight, $locations, $shortestRoute, $shortestWeight);
                    }
                }
            }
        }


        // Iniciar la búsqueda desde la ubicación de inicio
        backtrack($visited, $route, $totalWeight, $locations, $shortestRoute, $shortestWeight, );

        if ($shortestRoute === null) {
            session()->flash('message', 'No es posible recorrer todos los puntos');
            return redirect()->route('home');
        }

        // Devolver una redirección a la página de inicio con la ruta más corta y su peso
        return redirect()->route('home')->with('route', $shortestRoute)->with('totalWeight', $shortestWeight);
    }
}
