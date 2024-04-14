<?php

namespace App\Http\Controllers;

use App\Models\sitios;
use App\Models\etiquetas;
use App\Models\etiquetassitios;

use Illuminate\Http\Request;

class CoordenadasController extends Controller
{
    public function obtenerCoordenadas()
    {
        $coordenadas = Sitios::select('latitud', 'longitud', 'ico_sitio', 'nom_sitio as nombre')->get();
        return response()->json($coordenadas);
    }

    public function obtenerCoordenadasfiltro(Request $request)
    {
        $request = $request->input('id');

        if (isset($request) && $request <> NULL && $request > 0) {
            $coordenadas = etiquetassitios::select('tbl_sitios.*')
                ->join('tbl_sitios', 'tbl_etiquetas_sitios.id_sitio', '=', 'tbl_sitios.id')
                ->where('id_etiqueta', $request)->get();
            return response()->json($coordenadas);
        } else {
            $coordenadas = Sitios::select('latitud', 'longitud', 'ico_sitio', 'nom_sitio as nombre')->get();
            return response()->json($coordenadas);
        }
    }

    public function jsCoordenadas()
    {
        return response()->file(public_path('js/coordenadas.js'));
    }
}
