<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\MapaController;

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
    return view('auth.login');
});

Route::get('/evento/mostrar', [App\Http\Controllers\EventoController::class,'show'])->middleware('auth');
Route::post('/evento/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit'])->middleware('auth');
Route::post('/evento/actualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update'])->middleware('auth');
Route::post('/evento/borrar/{id}', [App\Http\Controllers\EventoController::class,'destroy'])->middleware('auth');




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('ruta',RutaController::class)->middleware('auth');
Route::resource('cliente',ClienteController::class)->middleware('auth');
Route::resource('mapa',MapaController::class)->middleware('auth');
Route::resource('evento',EventoController::class)->middleware('auth');

 

 
 
 


 
 