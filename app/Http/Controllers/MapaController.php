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
        return view('mapa', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'etiquetassitios', 'favoritos'));
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
        // $gimcanas = gimcanas::all();
        // $gruposgimcanas = gruposgimcanas::all();
        // $gruposgimcanas = gruposgimcanas::where('id_gimcana', $id)->get();
        $gruposgimcanas = gruposgimcanas::all();
        // $gimcana = gimcanas::find($id);
        $grupos = grupos::all();
        // $gimcanas = gimcanas::all();
        $gimcanas = gimcanas::where('id', $id)->get();
        $usuariosgrupos = usuariosgrupos::all();
        // $gruposgimcanas = gruposgimcanas::where('id_gincana', $gincana)->get();
        return view('menugimcana', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'grupos', 'usuariosgrupos', 'id'));
    }

    public function grupoespera()
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gimcanas = gimcanas::all();
        $grupos = grupos::all();
        $gruposgimcanas = gruposgimcanas::all();
        return view('grupoespera', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'grupos'));
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

        // Crear un nuevo grupo
        $grupo = new grupos();
        $grupo->nombre_grupo = $request->nombre_grupo;
        $grupo->capacidad_grupo = $request->capacidad_grupo;
        $grupo->id_usuario = session('id');
        $grupo->save();

        // Obtener el ID del grupo recién creado
        $id_grupo = $grupo->id;

        // Obtener el ID de la gimcana desde el formulario
        $id_gimcana = $request->input('id_gimcana');

        // Asociar el grupo recién creado con la gimcana
        $gruposgimcanas = new gruposgimcanas();
        $gruposgimcanas->id_grupo = $id_grupo;
        $gruposgimcanas->id_gimcana = $id_gimcana;
        $gruposgimcanas->save();

        $usuariosgrupos = new usuariosgrupos();
        $usuariosgrupos->id_usuario = session('id');
        $usuariosgrupos->id_grupo = $id_grupo;
        $usuariosgrupos->save();

        // Redirigir al usuario a la página menugimcana
        return redirect()->route('menugimcana', ['id' => $id_gimcana]);
    }















    // public function unirseAGrupo($id_grupo)
    // {
    //     // Aquí puedes agregar la lógica para insertar un nuevo registro en tbl_usuarios_grupos
    //     $usuarioGrupo = new usuariosgrupos();
    //     $usuarioGrupo->id_usuario = session('id');
    //     $usuarioGrupo->id_grupo = $id_grupo;
    //     $usuarioGrupo->save();

    //     // Puedes redirigir a una página de éxito o volver a la página anterior
    //     return redirect()->back()->with('success', 'Te has unido al grupo exitosamente.');
    // }
}
