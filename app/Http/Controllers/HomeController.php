<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $jsonData = json_decode(file_get_contents('../resources/json/data.json'), true);
        foreach ($jsonData['ubicaciones'] as $ubicacionData) {
            location::create([
                'nombre' => $ubicacionData['nombre'],
                'posX' => $ubicacionData['posX'],
                'posY' => $ubicacionData['posY'],
            ]);
        }


        $locations = location::all();
        return view('home', compact('locations'));
    }
}
