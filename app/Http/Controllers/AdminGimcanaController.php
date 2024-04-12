<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\gimcanas;
use App\Models\gruposgimcanas;

class AdminGimcanaController extends Controller
{
    // Función para mostrar la página de administración
    public function admin(){
        return view('admin.admin');
    }

    public function listar(){
        $gimcanas = gimcanas::all();
        return response()->json($gimcanas);
    }

    // Función para crear una nueva gimcana
    public function crearGimcana(Request $request){
        $nombre_gimcana = $request->input('nombre_gimcana');
        $descripcion_gimcana = $request->input('descripcion_gimcana');

        $gimcana = new gimcanas();
        $gimcana->nombre_gimcana = $nombre_gimcana;
        $gimcana->descripcion_gimcana = $descripcion_gimcana;
        $gimcana->save();
        return response()->json(['message' => 'Gimcana creada correctamente'], 200);
    }

    public function update(Request $request, gimcanas $gimcana){
        $gimcana->nombre_gimcana = $request->nombre_gimcana;
        $gimcana->descripcion_gimcana = $request->descripcion;
        $gimcana->save();
        return redirect()->route('admin.update', $gimcana->id);
    }


    // Función para editar una gimcana
    public function editar($id)
    {
        $gimcana = gimcanas::find($id);
        return view('admin.editar', compact('gimcana'));
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id');
        $resultado = gimcanas::find($id);
        $resultado->delete();
        $resultado2 = gruposgimcanas::find($id);
        $resultado2->delete();
        echo "ok";
    }
}
