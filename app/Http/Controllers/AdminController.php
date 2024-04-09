<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\etiquetas;
use App\Models\sitios;
use App\Models\gruposgimcanas;
use App\Models\gimcanas;
use App\Models\grupos;
use App\Models\etiquetassitios;
use App\Models\favoritos;
use App\Models\usuariosgrupos;
use App\Models\pruebas;

class AdminController extends Controller
{
    // Función para crear una nueva gimcana
    public function crearGimcana(Request $request)
    {
        $request->validate([
            'nombre_gimcana' => 'required|string|max:30',
            'descripcion_gimcana' => 'required|string|max:200'
        ]);

        $gimcana = new gimcanas;
        $gimcana->nombre_gimcana = $request->nombre_gimcana;
        $gimcana->descripcion_gimcana = $request->descripcion_gimcana;

        $gimcana->save();

        return redirect()->route('admin.admin')->with('success', 'Gimcana creada exitosamente');
    }
    
    public function admin()
    {
        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gruposgimcanas = gruposgimcanas::all();
        $gimcanas = gimcanas::all();
        $etiquetassitios = etiquetassitios::all();
        $favoritos = favoritos::all();
        $pruebas = pruebas::all();
        return view('admin.admin', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'etiquetassitios', 'favoritos', 'pruebas'));
    }

    // Función para actualizar una gimcana existente
    public function update(Request $request, gimcanas $gimcana)
    {
        $request->validate([
            'nombre_gimcana' => 'required|string|max:30',
            'descripcion_gimcana' => 'required|string|max:200'
        ]);

        $gimcana->nombre_gimcana = $request->nombre_gimcana;
        $gimcana->descripcion_gimcana = $request->descripcion_gimcana;

        $gimcana->save();

        $etiquetas = etiquetas::all();
        $sitios = sitios::all();
        $gruposgimcanas = gruposgimcanas::all();
        $gimcanas = gimcanas::all();
        $etiquetassitios = etiquetassitios::all();
        $favoritos = favoritos::all();
        return redirect()->route('admin.admin', compact('etiquetas', 'sitios', 'gruposgimcanas', 'gimcanas', 'etiquetassitios', 'favoritos'));
    }

    // Función para mostrar la página de administración


    // Función para editar una gimcana
    public function editar($id)
    {
        $gimcana = gimcanas::find($id);
        return view('admin.editar', compact('gimcana'));
    }

    // Función para agregar una nueva gimcana
    public function agregar()
    {
        return view('admin.agregar');
    }
}