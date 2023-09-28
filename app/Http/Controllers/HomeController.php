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

        // Obtener ubicaciones y realizar ajustes
        $locations = Location::all();

        $maxX = max(abs($locations->max('posX')), abs($locations->min('posX')));
        $maxY = max(abs($locations->max('posY')), abs($locations->min('posY')));

        $route = session('route');
        $totalWeight = session('totalWeight');

        return view('home', compact('locations', 'maxX', 'maxY', 'route', 'totalWeight'));

    }
}
