<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\gimcanas;

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

        $gimcanas = gimcanas::all();
        return redirect()->route('admin.admin', compact('gimcanas'));
    }

    // Función para mostrar la página de administración
    public function admin()
    {
        $gimcanas = gimcanas::all();
        return view('admin.admin', compact('gimcanas'));
    }

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
