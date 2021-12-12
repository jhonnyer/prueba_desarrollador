<?php

use Illuminate\Support\Facades\Route;
use App\Http\Models\Propietario;
use App\Http\Models\Vehiculo;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('parqueadero/propietarios','App\Http\Controllers\PropietariosController');

// Auth::routes();


Route::resource('parqueadero/vehiculos','App\Http\Controllers\VehiculosController');

Route::resource('parqueadero/cons_vehiculos','App\Http\Controllers\VehiculosConsultasController');

// Auth::routes();