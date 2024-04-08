<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    // public function todo()
    // {
    //     $filtro = 'Todos los tipos';
    //     $filtro2 = '-';

    //     $userId = session('user_id');
    //     $userNombre = session('user_nombre');
    //     $rolUser = session('id_rol');

    //     $restaurantes = tbl_restaurantes::paginate(12);

    //     $mediaEstrellas = [];

    //     foreach ($restaurantes as $restaurante) {
    //         $id = $restaurante->id;
    //         $mediaEstrellas[$id] = tbl_estrellas::where('id_restaurante', $id)
    //             ->selectRaw('ROUND(AVG(num_estrellas), 1) as media_estrellas')
    //             ->first()->media_estrellas;
    //     }

    //     $mostrarPaginador = true;
    //     return view('vistas.todo', compact('filtro', 'filtro2', 'restaurantes', 'userId', 'userNombre', 'rolUser', 'mostrarPaginador', 'mediaEstrellas'));
    // }


    // // ------------------------- FUNCIONES CRUD

    // public function crearRestaurante(Request $request)
    // {
    //     Validator::extend('contacto_length', function ($value) {
    //         return preg_match('/^\d{9}$/', $value);
    //     });

    //     Validator::extend('precio_menu_format', function ($value) {
    //         return preg_match('/^\d{1,4}(\.\d{1,2})?$/', $value);
    //     });

    //     $request->validate([
    //         'nombre_restaurante' => 'required|string|max:255',
    //         'descripcion' => 'required|string',
    //         'localizacion' => 'required|string|max:255',
    //         'contacto' => 'required|numeric|digits:9',
    //         'precio_menu' => 'required|regex:/^\d{1,3}(\.\d{1,2})?$/',
    //         'tipo_comida' => 'required|string|max:255',
    //         'chef' => 'required|string|max:255',
    //     ], [
    //         'contacto.digits' => 'El contacto debe tener 9 dígitos.',
    //         'precio_menu.regex' => 'El precio debe tener este formato: XXX,XX',
    //     ]);

    //     $restaurante = new tbl_restaurantes;
    //     $restaurante->nombre_restaurante = $request->nombre_restaurante;
    //     $restaurante->descripcion = $request->descripcion;
    //     $restaurante->localizacion = $request->localizacion;
    //     $restaurante->contacto = $request->contacto;
    //     $restaurante->precio_menu = $request->precio_menu;
    //     $restaurante->tipo_comida = $request->tipo_comida;
    //     $restaurante->chef = $request->chef;
    //     $restaurante->imagen = str_replace(' ', '_', $request->nombre_restaurante) . '.jpg';
    //     $restaurante->estado = '1';
    //     $restaurante->save();

    //     return redirect()->route('admin.admin')->with('success', 'Restaurante creado exitosamente');
    // }

    // public function update(Request $request, tbl_restaurantes $restaurante)
    // {
    //     $restaurante->nombre_restaurante = $request->nombre_restaurante;
    //     $restaurante->descripcion = $request->descripcion;
    //     $restaurante->localizacion = $request->localizacion;
    //     $restaurante->contacto = $request->contacto;
    //     $restaurante->precio_menu = $request->precio_menu;
    //     $restaurante->tipo_comida = $request->tipo_comida;
    //     $restaurante->chef = $request->chef;

    //     $restaurante->save();

    //     $restaurantes = tbl_restaurantes::all();
    //     return redirect()->route('admin.admin', compact('restaurantes'));
    // }

    // public function admin() {
    //     $userNombre = session('user_nombre');
    //     $rolUser = session('id_rol');
    //     $restaurantes = tbl_restaurantes::all();

    //     $mediaEstrellas = [];

    //     foreach ($restaurantes as $restaurante) {
    //         $id = $restaurante->id;
    //         $mediaEstrellas[$id] = tbl_estrellas::where('id_restaurante', $id)
    //             ->selectRaw('ROUND(AVG(num_estrellas), 1) as media_estrellas')
    //             ->first()->media_estrellas;
    //     }

    //     if ($rolUser == 1) {
    //         $restaurantes = tbl_restaurantes::all();
    //         return view('admin.admin', compact('restaurantes', 'userNombre', 'rolUser', 'mediaEstrellas'));
    //     } else {
    //         return $this->todo();
    //     }
    // }

    // public function editar($id)
    // {
    //     $userNombre = session('user_nombre');
    //     $rolUser = session('id_rol');
    //     if ($rolUser == 1) {
    //         $restaurante = tbl_restaurantes::find($id);
    //         return view('admin.editar', compact('restaurante', 'userNombre'));
    //     } else {
    //         return $this->todo();
    //     }
    // }

    // public function agregar()
    // {
    //     $userNombre = session('user_nombre');
    //     $rolUser = session('id_rol');
    //     if ($rolUser == 1) {
    //         return view('admin.agregar', compact('userNombre'));
    //     } else {
    //         return $this->todo();
    //     }
    // }
}
