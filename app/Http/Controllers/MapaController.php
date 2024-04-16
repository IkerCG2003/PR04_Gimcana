<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\etiquetas;
use App\Models\sitios;
use App\Models\gruposgimcanas;
use App\Models\gimcanas;
use App\Models\grupos;
use App\Models\etiquetassitios;
use App\Models\favoritos;
use App\Models\usuariosgrupos;
use App\Models\etiquetasusuarios;



class MapaController extends Controller
{
    public function mapa()
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gruposgimcanas = gruposgimcanas::all();
        $gimcanas = gimcanas::all();
        $etiquetassitios = etiquetassitios::all();
        $favoritos = favoritos::all();
        $etiquetasusuarios = etiquetasusuarios::all();
        return view('mapa', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'etiquetassitios', 'favoritos', 'etiquetasusuarios'));
    }

    public function interes()
    {
        return view('interes');
    }

    public function todasgimcanas()
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gimcanas = gimcanas::all();
        $grupos = grupos::all();
        $gruposgimcanas = gruposgimcanas::all();
        $usuariosgrupos = usuariosgrupos::all();
        return view('todasgimcanas', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'grupos', 'usuariosgrupos'));
    }

    public function favoritos()
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gruposgimcanas = gruposgimcanas::all();
        $gimcanas = gimcanas::all();
        $etiquetassitios = etiquetassitios::all();
        $favoritos = favoritos::all();
        return view('favoritos', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'etiquetassitios', 'favoritos'));
    }

    public function menugimcana($id)
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();

        $gruposgimcanas = gruposgimcanas::all();
        $grupos = grupos::all();
        $gimcanas = gimcanas::where('id', $id)->get();
        $usuariosgrupos = usuariosgrupos::all();
        return view('menugimcana', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'grupos', 'usuariosgrupos', 'id'));
    }

    public function unirseGrupo(Request $request)
    {
        $id_gimcana = $request->input('id_gimcana');

        $usuariosgrupos = new usuariosgrupos();
        $usuariosgrupos->id_usuario = session('id');
        $usuariosgrupos->id_grupo = $request->id_gimcana;
        $usuariosgrupos->save();

        return redirect()->route('menugimcana', ['id' => $id_gimcana]);
    }

    public function grupoespera()
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gimcanas = gimcanas::all();
        $grupos = grupos::all();
        $gruposgimcanas = gruposgimcanas::all();
        $usuariosgrupos = usuariosgrupos::all();
        return view('grupoespera', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'grupos', 'usuariosgrupos'));
    }

    public function creargrupo($id)
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gimcanas = gimcanas::where('id', $id)->get();
        $grupos = grupos::all();
        $gruposgimcanas = gruposgimcanas::all();
        return view('creargrupo', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'grupos', 'id'));
    }

    public function nuevoGrupo(Request $request)
    {
        $request->validate([
            'nombre_grupo' => 'required|string|max:30',
            'capacidad_grupo' => 'required|integer',
        ]);

        $grupo = new grupos();
        $grupo->nombre_grupo = $request->nombre_grupo;
        $grupo->capacidad_grupo = $request->capacidad_grupo;
        $grupo->id_usuario = session('id');
        $grupo->save();

        $id_grupo = $grupo->id;
        $id_gimcana = $request->input('id_gimcana');

        $gruposgimcanas = new gruposgimcanas();
        $gruposgimcanas->id_grupo = $id_grupo;
        $gruposgimcanas->id_gimcana = $id_gimcana;
        $gruposgimcanas->save();

        $usuariosgrupos = new usuariosgrupos();
        $usuariosgrupos->id_usuario = session('id');
        $usuariosgrupos->id_grupo = $id_grupo;
        $usuariosgrupos->save();

        return redirect()->route('menugimcana', ['id' => $id_gimcana]);
    }


    public function etiquetaUsuario()
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gimcanas = gimcanas::all();
        $grupos = grupos::all();
        $gruposgimcanas = gruposgimcanas::all();
        $etiquetasusuarios = etiquetasusuarios::all();
        return view('etiquetaUsuario', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'grupos', 'etiquetasusuarios'));
    }

    public function etiquetaUsuarioCrear(Request $request)
    {
        $request->validate([
            'nombre_etiqueta' => 'required|string|max:30',
        ]);

        $etiquetasusuarios = new etiquetasusuarios();
        $etiquetasusuarios->nombre_etiqueta = $request->nombre_etiqueta;
        $etiquetasusuarios->id_usuario = session('id');
        $etiquetasusuarios->save();

        return redirect()->route('mapa');
    }


    public function añadirEtiquetaSitio($id)
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::where('id', $id)->get();
        $gimcanas = gimcanas::all();
        $grupos = grupos::all();
        $gruposgimcanas = gruposgimcanas::all();
        $etiquetasusuarios = etiquetasusuarios::all();
        return view('etiquetaUsuario', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'grupos', 'etiquetasusuarios', 'id'));
    }

    public function añadirEtiquetaSitioAccion(Request $request)
    {
        $request->validate([
            'nombre_etiqueta' => 'required|string|max:30',
        ]);

        // $id_gimcana = $request->input('id_gimcana');
        // $gruposgimcanas->id_gimcana = $id_gimcana;

        $etiquetasusuarios = new etiquetasusuarios();
        $etiquetasusuarios->nombre_etiqueta = $request->nombre_etiqueta;
        $etiquetasusuarios->id_usuario = session('id');
        $etiquetasusuarios->save();

        return redirect()->route('mapa');
    }
}
