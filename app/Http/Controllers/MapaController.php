<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\etiquetas;
use App\Models\sitios;

class MapaController extends Controller
{
    public function mapa()
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        return view('mapa', compact('etiquetas', 'sitios'));
    }
}
