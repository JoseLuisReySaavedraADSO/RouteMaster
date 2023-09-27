<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Models\Connection;
use App\Models\location;

class LocationController extends Controller
{
    public function store(StoreLocationRequest $data)
    {

        $data = [
            'nombre' => $data['nombre'],
            'posX' => $data['posx'],
            'posY' => $data['posy'],
        ];

        $Location = location::create($data);
        $this->connections();
        return redirect()->route('home');
        // return view('home');
    }

    public function update(StoreLocationRequest $data, $id)
    {
        // Validar los datos del formulario de edición

        // dd($id);
        $location = Location::find($id);
        // dd($location);

        $location->nombre = $data->input('nombre');
        $location->posX = $data->input('coorx');
        $location->posY = $data->input('coory');

        // Obtener la ubicación que deseas editar

        $this->connections();
        $location->save();

        // Redirigir a la página de inicio o a donde desees después de editar
        return redirect()->route('home')->with('success', 'Ubicación actualizada exitosamente');
    }

    public function destroy($id)
    {
        // Buscar la ubicacion por su ID
        $location = location::findOrFail($id);

        Connection::where('ubicacion1_id', $location->id)->orWhere('ubicacion2_id', $location->id)->delete();
        

        // Eliminar la ubicacion
        $location->delete();


        return redirect()->route('home')->with('success', 'Mascota eliminada exitosamente');
    }


    public function connections()
    {
        function calculateDistance($x1, $y1, $x2, $y2)
        {
            return sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
        }

        // Eliminar todos los registros existentes en la tabla connections
        Connection::truncate();

        $locations = Location::get();
        foreach ($locations as $location1) {
            foreach ($locations as $location2) {
                if ($location1->id != $location2->id) {
                    $distance = calculateDistance($location1->posX, $location1->posY, $location2->posX, $location2->posY);

                    // Insertar la distancia en la tabla connections
                    Connection::create([
                        'ubicacion1_id' => $location1->id,
                        'ubicacion2_id' => $location2->id,
                        'peso' => $distance,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
