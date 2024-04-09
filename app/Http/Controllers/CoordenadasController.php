<?php

namespace App\Http\Controllers;
use App\Models\sitios;

use Illuminate\Http\Request;

class CoordenadasController extends Controller
{
    public function obtenerCoordenadas()
    {
        $coordenadas = Sitios::select('id','latitud', 'longitud', 'nom_sitio as nombre')->get();
        return response()->json($coordenadas);
    }
    
    public function jsCoordenadas()
    {
        return response()->file(public_path('js/coordenadas.js'));
    }
}
