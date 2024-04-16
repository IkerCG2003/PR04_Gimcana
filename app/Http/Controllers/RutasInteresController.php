<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RutasInteresController extends Controller
{
    public function obtenerCoordenadas()
    {
        $coordenadas = Sitios::all(); 
        return response()->json($coordenadas);
    }
    
    public function jsCoordenadas()
    {
        return response()->file(public_path('js/coordenadas.js'));
    }
}
