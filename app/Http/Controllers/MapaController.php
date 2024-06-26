<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\etiquetas;
use App\Models\sitios;
use App\Models\gruposgimcanas;
use App\Models\gimcanas;
use App\Models\grupos;
use App\Models\etiquetassitios;


class MapaController extends Controller
{
    public function mapa()
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gruposgimcanas = gruposgimcanas::all();
        $gimcanas = gimcanas::all();
        $etiquetassitios = etiquetassitios::all();
        return view('mapa', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'etiquetassitios'));
        // if (!isset($_SESSION['email'])) {
        //     return view('login');
        // } else {
        //     return view('mapa', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'etiquetassitios'));
        // }
    }

    public function gincana()
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gruposgimcanas = gruposgimcanas::all();
        $gimcanas = gimcanas::all();
        $etiquetassitios = etiquetassitios::all();
        return view('gimcana', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'etiquetassitios'));
        // if (!isset($_SESSION['email'])) {
        //     return view('login');
        // } else {
        //     return view('mapa', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'etiquetassitios'));
        // }
    }

    public function todasgimcanas()
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gimcanas = gimcanas::all();
        $grupos = grupos::all();
        $gruposgimcanas = gruposgimcanas::all();
        return view('todasgimcanas', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'grupos'));
    }

    public function menugimcana($id)
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        // $gimcanas = gimcanas::all();
        // $gruposgimcanas = gruposgimcanas::all();
        $gruposgimcanas = gruposgimcanas::where('id_gimcana', $id)->get();

        // $gimcana = gimcanas::find($id);
        $grupos = grupos::all();
        $gimcanas = gimcanas::all();

        // $gruposgimcanas = gruposgimcanas::where('id_gincana', $gincana)->get();
        return view('menugimcana', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'grupos'));
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

    public function nuevoGrupo(Request $request)
    {
        $request->validate([
            'numero_grupo' => 'required|integer',
            'nombre_grupo' => 'required|string|max:30',
            'capacidad_grupo' => 'required|integer',
        ]);

        $grupo = new grupos();
        $grupo->numero_grupo = $request->numero_grupo;
        $grupo->nombre_grupo = $request->nombre_grupo;
        $grupo->capacidad_grupo = $request->capacidad_grupo;
        $grupo->save();

        return redirect()->route('menugimcana');
    }

}