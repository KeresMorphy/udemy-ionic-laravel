<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{

    //GET FUNCION BUSCAR TODOS LOS VIDEOJUEGOS
    public function todoslosvideojuegos()
    {
        return response()->json(Videojuego::all(), 200);
    }



    public function obtenerporId($id){
         $videojuego = Videojuego::find($id);
         // Verifica si el cliente no se encontró (es nulo).
         if (is_null($videojuego)) {
             return response()->json(['message' => 'Cliente no encontrado'], 404);
         }
         // Si se encontró el cliente, devuelve una respuesta JSON con los detalles del cliente y un código de estado 200 (OK).
         return response()->json($videojuego, 200);
    }


     //POST
     public function añadirvideojuego(Request $request)
     {
         // Crea un nuevo cliente en la base de datos utilizando los datos de la solicitud.
         $videojuego = Videojuego::create($request->all());

         // Responde con los datos del cliente recién creado y un código de estado 201 (Creado).
         return response($videojuego, 201);
     }



}
