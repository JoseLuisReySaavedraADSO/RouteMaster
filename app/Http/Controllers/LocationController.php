<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
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
        return redirect()->route('home');
        // return view('home');
    }
}
