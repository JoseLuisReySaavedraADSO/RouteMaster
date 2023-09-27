<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// RUTA PARA VISTA PRINCIPAL
Route::get('/', function () {
    return view('welcome');
});

// RUTA PARA AGREGAR UBICACIÓN


// RUTA PARA CALCULAR LA RUTA ENTRE NODOS
Route::post('/calculate', [App\Http\Controllers\RouteController::class, 'calculate'])->name('calculate');

// RUTA PARA VERIFICACIÓN DE CORREO
Auth::routes(['verify' => true]);

// RUTA PARA VISTA INICIO CON MIDDLEWARE PARA VERIFICACIÓN DE CORREO
Route::post('/add', [App\Http\Controllers\LocationController::class, 'store'])->name('add');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::post('/update/{id}', [App\Http\Controllers\LocationController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [App\Http\Controllers\LocationController::class, 'destroy'])->name('delete');

//Importar JSON
Route::get('/prueba', [App\Http\Controllers\JsonController::class, 'prueba'])->name('prueba');
Route::get('/basico', [App\Http\Controllers\JsonController::class, 'basico'])->name('basico');
Route::get('/medio', [App\Http\Controllers\JsonController::class, 'medio'])->name('medio');

