<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use GuzzleHttp\Client;

class ClienteController extends Controller
{


    //GET ALL
    public function obtenerClientes()
    {
        return response()->json(Cliente::all(), 200);
    }


    //GET POR ID
    public function obtenerporId($id)
    {
        // Intenta encontrar un cliente en la base de datos por su ID.
        $cliente = Cliente::find($id);

        // Verifica si el cliente no se encontró (es nulo).
        if (is_null($cliente)) {
            // Si no se encontró, devuelve una respuesta JSON con un mensaje de error y un código de estado 404 (No encontrado).
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        // Si se encontró el cliente, devuelve una respuesta JSON con los detalles del cliente y un código de estado 200 (OK).
        return response()->json($cliente, 200);
    }



    //POST
    public function añadirCliente(Request $request)
    {
        // Crea un nuevo cliente en la base de datos utilizando los datos de la solicitud.
        $cliente = Cliente::create($request->all());

        // Responde con los datos del cliente recién creado y un código de estado 201 (Creado).
        return response($cliente, 201);
    }

    //PUT
    public function actualizarCliente(Request $request, $id)
    {
        // Buscar el cliente por su ID
        $cliente = Cliente::find($id);
        // Verificar si el cliente no se encontró
        if (is_null($cliente)) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }
        // Actualizar los atributos del cliente con los datos de la solicitud
        $cliente->update($request->all());
        // Responder con los datos actualizados del cliente
        return response()->json($cliente, 200);
    }

    //DELETE
    public function eliminarCliente(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if (is_null($cliente)){
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }
        $cliente->delete();
        return response()->json(['message' => 'Cliente eliminado'], 204);
    }
}
