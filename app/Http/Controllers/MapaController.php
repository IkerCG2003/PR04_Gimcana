<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\etiquetas;
use App\Models\sitios;
use App\Models\gruposgimcanas;
use App\Models\gimcanas;
use App\Models\grupos;

class MapaController extends Controller
{
    public function mapa()
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gruposgimcanas = gruposgimcanas::all();
        $gimcanas = gimcanas::all();
        return view('mapa', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas'));
    }

    public function menugimcana($id)
    {
        // $gincana = session('id_gincana');
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        // $gimcanas = gimcanas::all();
        // $gruposgimcanas = gruposgimcanas::all();
        $gruposgimcanas = gruposgimcanas::where('id_gimcana', $id)->get();

        // $gimcana = gimcanas::find($id);
        $grupos = grupos::all();

        // $gruposgimcanas = gruposgimcanas::where('id_gincana', $gincana)->get();
        return view('menugimcana', compact('etiquetas', 'sitios', 'gruposgimcanas', 'grupos'));
    }

    public function grupoespera()
    {
        // $gincana = session('id_gincana');
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gimcanas = gimcanas::all();
        $grupos = grupos::all();
        $gruposgimcanas = gruposgimcanas::all();
        return view('grupoespera', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'grupos'));
    }

    public function creargrupo()
    {
        // $gincana = session('id_gincana');
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gimcanas = gimcanas::all();
        $grupos = grupos::all();
        $gruposgimcanas = gruposgimcanas::all();
        return view('creargrupo', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'grupos'));
    }
}
