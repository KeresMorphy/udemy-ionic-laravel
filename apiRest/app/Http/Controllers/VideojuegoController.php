<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{

    //GET 
    //FUNCION BUSCAR TODOS LOS VIDEOJUEGOS
    public function todoslosvideojuegos()
    {
        return response()->json(Videojuego::all(), 200);
    }


    //GET por ID
    public function obtenerporId($id)
    {
        $videojuego = Videojuego::find($id);
        // Verifica si el cliente no se encontró (es nulo).
        if (is_null($videojuego)) {
            return response()->json(['message' => 'Video juego no encontrado'], 404);
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

    //PUT
    public function actualizarVideojuego(Request $request, $id)
    {
        // Buscar el cliente por su ID
        $videojuego = Videojuego::find($id);
        // Verificar si el cliente no se encontró
        if (is_null($videojuego)) {
            return response()->json(['message' => 'video juego no encontrado'], 404);
        }
        // Actualizar los atributos del cliente con los datos de la solicitud
        $videojuego->update($request->all());
        // Responder con los datos actualizados del cliente
        return response()->json($videojuego, 200);
    }

    //DELETE
    public function eliminarVideojuego(Request $request, $id)
    {
        $videojuego = Videojuego::find($id);
        if (is_null($videojuego)) {
            return response()->json(['message' => 'video juego no encontrado'], 404);
        }
        $videojuego->delete();
        return response()->json(['message' => 'video juego no encontrado'], 404);
    }
}
