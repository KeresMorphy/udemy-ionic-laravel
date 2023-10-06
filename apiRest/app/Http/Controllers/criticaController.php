<?php

namespace App\Http\Controllers;

use App\Models\Critica;
use Illuminate\Http\Request;

class criticaController extends Controller
{
    public function obtenertodos(){
        return response()->json(Critica::all(),200);
    }

    public function anadirCritica(Request $request){
        $critica = new Critica;
        $critica->id_cliente = $request->input('id_cliente');
        $critica->id_videojuego = $request->input('id_videojuego');
        $critica->critica = $request->input('critica');
        $critica->save();
        return response($critica,201);
    }


}
