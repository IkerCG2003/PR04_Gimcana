<?php
namespace App\Http\Controllers;
use App\Models\sitios;
use App\Models\etiquetas;

use Illuminate\Http\Request;

class CoordenadasController extends Controller
{
    public function obtenerCoordenadas()
    {
        $coordenadas = Sitios::select('latitud', 'longitud', 'ico_sitio', 'nom_sitio as nombre')->get();
        // $etiquetas = etiquetas::select('id_etiqueta', 'id_sitio')->get();
        return response()->json($coordenadas);
    }
    
    public function jsCoordenadas()
    {
        return response()->file(public_path('js/coordenadas.js'));
    }
}