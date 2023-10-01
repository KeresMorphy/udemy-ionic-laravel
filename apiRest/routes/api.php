<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VideojuegoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//buscar todos
Route::get('clientes', [ClienteController::class, 'obtenerClientes']);
//buscar por idCliente
Route::get('clientes/{id}', [ClienteController::class, 'obtenerporId']);
//añadir nuevo cliente
Route::post('anadirCliente', [ClienteController::class, 'añadirCliente']);
//actualizar Clientes
Route::put('actualizarCliente/{id}', [ClienteController::class, 'actualizarCliente']);
//eliminar Cliente
Route::delete('eliminarCliente/{id}', [ClienteController::class, 'eliminarCliente']);


    //GET TODO LOS VIDEO JUEGOS
Route::get('videojuegos', [VideojuegoController::class, 'todoslosvideojuegos']);
    //GET POR ID
Route::get('videojuegos/{id}', [VideojuegoController::class, 'obtenerporId']);
// Ruta para actualizar un cliente por su ID
Route::post('añadirvideojuego', [VideojuegoController::class, 'añadirvideojuego']);
//actualizar Clientes
Route::put('actualizarVideojuego/{id}', [ClienteController::class, 'actualizarCliente']);
