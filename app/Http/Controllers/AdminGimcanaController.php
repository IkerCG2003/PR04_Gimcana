<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\gimcanas;
use App\Models\gruposgimcanas;
use App\Models\Usuarios;
use App\Models\grupos;
use App\Models\pruebas;
use App\Models\pruebassitios;
use App\Models\etiquetassitios;
use App\Models\sitios;
use App\Models\etiquetas;


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
        return redirect()->route('admin');
    }

    public function update(Request $request, gimcanas $gimcana){
        $gimcana->nombre_gimcana = $request->nombre_gimcana;
        $gimcana->descripcion_gimcana = $request->descripcion;
        $gimcana->save();
        return redirect()->route('admin', $gimcana->id);
    }


    // Función para editar una gimcana
    public function editar($id){
        $gimcana = gimcanas::find($id);
        return view('admin.editar', compact('gimcana'));
    }

    public function eliminar(Request $request){
        $id = $request->input('id');
        $resultado = gruposgimcanas::where('id_gimcana', $id);
        $resultado->delete();
        $resultado2 = gimcanas::find($id);
        $resultado2->delete();
        return "ok";
    }

    public function agregar(){
        return view('admin.agregar');
    }
    
    ////////////////////////////////////////////////////////////////

    // Función para mostrar la página de administración de usuario
    public function adminUsuario(){
        return view('adminUsuario.admin');
    }

    public function listarUsuario(){
        $usuarios = Usuarios::all();
        return response()->json($usuarios);
    }

    // Función para crear un nuevo usuario
    public function crearUsuario(Request $request){
        $nom_usuario = $request->input('nom_usuario');
        $apell_usuario = $request->input('apell_usuario');
        $email_usuario = $request->input('email_usuario');
        $pwd_usuario = $request->input('pwd_usuario');
        $rol_usuario = $request->input('rol_usuario');
        $usuario = new Usuarios();
        $usuario->nom_usuario = $nom_usuario;
        $usuario->apell_usuario = $apell_usuario;
        $usuario->email_usuario = $email_usuario;
        $usuario->pwd_usuario = $pwd_usuario;
        $usuario->rol_usuario = $rol_usuario;
        $usuario->save();
        return redirect()->route('adminUsuario');
    }

    public function updateUsuario(Request $request, Usuarios $usuario){
        $usuario->nom_usuario = $request->nom_usuario;
        $usuario->apell_usuario = $request->apell_usuario;
        $usuario->email_usuario = $request->email_usuario;
        $usuario->pwd_usuario = $request->pwd_usuario;
        $usuario->rol_usuario = $request->rol_usuario;
        $usuario->save();
        return redirect()->route('adminUsuario', $usuario->id);
    }


    // Función para editar un usuario
    public function editarUsuario($id){
        $usuario = Usuarios::find($id);
        return view('adminUsuario.editar', compact('usuario'));
    }

    public function eliminarUsuario(Request $request){
        $id = $request->input('id');
        $resultado = grupos::where('id_usuario', $id);
        $resultado->delete();
        $resultado2 = Usuarios::find($id);
        $resultado2->delete();
        return "ok";
    }

    public function agregarUsuario(){
        return view('adminUsuario.agregar');
    }

    ////////////////////////////////////////////////////////////////

    // Función para mostrar la página de administración del grupo
    public function adminGrupo(){
        return view('adminGrupo.admin');
    }

    public function listarGrupo(){
        $grupos = grupos::all();
        return response()->json($grupos);
    }

    // Función para crear un nuevo usuario
    public function crearGrupo(Request $request){
        $numero_grupo = $request->input('numero_grupo');
        $nombre_grupo = $request->input('nombre_grupo');
        $capacidad_grupo = $request->input('capacidad_grupo');
        $id_usuario = $request->input('id_usuario');
        $grupo = new grupos();
        $grupo->numero_grupo = $numero_grupo;
        $grupo->nombre_grupo = $nombre_grupo;
        $grupo->capacidad_grupo = $capacidad_grupo;
        $grupo->id_usuario = $id_usuario;
        $grupo->save();
        return redirect()->route('adminGrupo');
    }

    public function updateGrupo(Request $request, grupos $grupo){
        $grupo->numero_grupo = $request->numero_grupo;
        $grupo->nombre_grupo = $request->nombre_grupo;
        $grupo->capacidad_grupo = $request->capacidad_grupo;
        $grupo->id_usuario = $request->id_usuario;
        $grupo->save();
        return redirect()->route('adminGrupo', $grupo->id);
    }


    // Función para editar un grupo
    public function editarGrupo($id){
        $grupo = grupos::find($id);
        return view('adminGrupo.editar', compact('grupo'));
    }

    public function eliminarGrupo(Request $request){        
        $id = $request->input('id');
        $resultado = gruposgimcanas::where('id_grupo', $id);
        $resultado->delete();
        $resultado2 = grupos::find($id);
        $resultado2->delete();
        return "ok";
    }

    public function agregarGrupo(){
        return view('adminGrupo.agregar');
    }

    // Función para listar la página de administración del grupo

    public function listarGrupoGimcana(){
        $gruposgimcanas = gruposgimcanas::all();
        return response()->json($gruposgimcanas);
    }

    // Función para crear un nuevo usuario
    public function crearGrupoGimcana(Request $request){
        $id_grupo = $request->input('id_grupo');
        $id_gimcana = $request->input('id_gimcana');
        $grupogimcana = new gruposgimcanas();
        $grupogimcana->id_grupo = $id_grupo;
        $grupogimcana->id_gimcana = $id_gimcana;
        $grupogimcana->save();
        return redirect()->route('adminGrupo');
    }

    public function updateGrupoGimcana(Request $request, gruposgimcanas $grupogimcana){
        $grupogimcana->id_grupo = $request->id_grupo;
        $grupogimcana->id_gimcana = $request->id_gimcana;
        $grupogimcana->save();
        return redirect()->route('adminGrupo', $grupogimcana->id);
    }


    // Función para editar un grupo
    public function editarGrupoGimcana($id){
        $gruposgimcanas = gruposgimcanas::find($id);
        return view('adminGrupo.editar2', compact('gruposgimcanas'));
    }

    public function eliminarGrupoGimcana(Request $request){
        $id = $request->input('id');
        $resultado = gruposgimcanas::find($id);
        $resultado->delete();
        return "ok";
    }

    public function agregarGrupoGimcana(){
        return view('adminGrupo.agregar2');
    }

    ////////////////////////////////////////////////////////////////

    // Función para mostrar la página de administración del grupo
    public function adminPrueba(){
        return view('adminPrueba.admin');
    }

    public function listarPrueba(){
        $pruebas = pruebas::all();
        return response()->json($pruebas);
    }

    // Función para crear un nuevo usuario
    public function crearPrueba(Request $request){
        $nom_prueba = $request->input('nom_prueba');
        $pista_prueba = $request->input('pista_prueba');
        $estado_prueba = $request->input('estado_prueba');
        $prueba = new pruebas();
        $prueba->nom_prueba = $nom_prueba;
        $prueba->pista_prueba = $pista_prueba;
        $prueba->estado_prueba = $estado_prueba;
        $prueba->save();
        return redirect()->route('adminPrueba');
    }

    public function updatePrueba(Request $request, pruebas $prueba){
        $prueba->nom_prueba = $request->nom_prueba;
        $prueba->pista_prueba = $request->pista_prueba;
        $prueba->estado_prueba = $request->estado_prueba;
        $prueba->save();
        return redirect()->route('adminPrueba', $prueba->id);
    }


    // Función para editar una prueba
    public function editarPrueba($id){
        $prueba = pruebas::find($id);
        return view('adminPrueba.editar', compact('prueba'));
    }

    public function eliminarPrueba(Request $request){       
        $id = $request->input('id');
        $resultado = pruebassitios::where('id_sitio', $id);
        $resultado->delete();
        $resultado2 = pruebas::find($id);
        $resultado2->delete();
        return "ok";
    }

    public function agregarPrueba(){
        return view('adminPrueba.agregar');
    }

    // Función para listar la página de administración del grupo

    public function listarPruebaSitio(){
        $pruebassitios = pruebassitios::all();
        return response()->json($pruebassitios);
    }

    // Función para crear un nuevo usuario
    public function crearPruebaSitio(Request $request){
        $id_prueba = $request->input('id_prueba');
        $id_sitio = $request->input('id_sitio');
        $pruebasitio = new pruebassitios();
        $pruebasitio->id_prueba = $id_prueba;
        $pruebasitio->id_sitio = $id_sitio;
        $pruebasitio->save();
        return redirect()->route('adminPrueba');
    }

    public function updatePruebaSitio(Request $request, pruebassitios $pruebasitio){
        $pruebasitio->id_prueba = $request->id_prueba;
        $pruebasitio->id_sitio = $request->id_sitio;
        $pruebasitio->save();
        return redirect()->route('adminPrueba', $pruebasitio->id);
    }


    // Función para editar un grupo
    public function editarPruebaSitio($id){
        $pruebassitios = pruebassitios::find($id);
        return view('adminPrueba.editar2', compact('pruebassitios'));
    }

    public function eliminarPruebaSitio(Request $request){
        $id = $request->input('id');
        $resultado = pruebassitios::find($id);
        $resultado->delete();
        return "ok";
    }

    public function agregarPruebaSitio(){
        return view('adminPrueba.agregar2');
    }
    
    ////////////////////////////////////////////////////////////////

    // Función para mostrar la página de administración del grupo
    public function adminSitio(){
        return view('adminSitio.admin');
    }

    public function listarSitio(){
        $sitios = sitios::all();
        return response()->json($sitios);
    }

    // Función para crear un nuevo usuario
    public function crearSitio(Request $request){
        $nom_sitio = $request->input('nom_sitio');
        $ubi_sitio = $request->input('ubi_sitio');
        $ico_sitio = $request->input('ico_sitio');
        $sitio = new sitios();
        $sitio->nom_sitio = $nom_sitio;
        $sitio->ubi_sitio = $ubi_sitio;
        $sitio->ico_sitio = $ico_sitio;
        $sitio->save();
        return redirect()->route('adminSitio');
    }

    public function updateSitio(Request $request, sitios $sitio){
        $sitio->nom_sitio = $request->nom_sitio;
        $sitio->ubi_sitio = $request->ubi_sitio;
        $sitio->ico_sitio = $request->ico_sitio;
        $sitio->save();
        return redirect()->route('adminSitio', $sitio->id);
    }


    // Función para editar una prueba
    public function editarSitio($id){
        $sitio = sitios::find($id);
        return view('adminSitio.editar', compact('sitio'));
    }

    public function eliminarSitio(Request $request){
        $id = $request->input('id');
        $resultado = etiquetassitios::where('id_sitio', $id);
        $resultado->delete();
        $resultado2 = pruebassitios::where('id_sitio', $id);
        $resultado2->delete();
        $resultado3 = sitios::find($id);
        $resultado3->delete();
        return "ok";
    }

    public function agregarSitio(){
        return view('adminSitio.agregar');
    }

    // Función para listar la página de administración del grupo

    public function listarSitioEtiqueta(){
        $etiquetassitios = etiquetassitios::all();
        return response()->json($etiquetassitios);
    }

    // Función para crear un nuevo usuario
    public function crearSitioEtiqueta(Request $request){
        $id_etiqueta = $request->input('id_etiqueta');
        $id_sitio = $request->input('id_sitio');
        $etiquetasitio = new etiquetassitios();
        $etiquetasitio->id_etiqueta = $id_etiqueta;
        $etiquetasitio->id_sitio = $id_sitio;
        $etiquetasitio->save();
        return redirect()->route('adminSitio');
    }

    public function updateSitioEtiqueta(Request $request, etiquetassitios $etiquetasitio){
        $etiquetasitio->id_etiqueta = $request->id_etiqueta;
        $etiquetasitio->id_sitio = $request->id_sitio;
        $etiquetasitio->save();
        return redirect()->route('adminSitio', $etiquetasitio->id);
    }


    // Función para editar un grupo
    public function editarSitioEtiqueta($id){
        $etiquetassitios = etiquetassitios::find($id);
        return view('adminSitio.editar2', compact('etiquetassitios'));
    }

    public function eliminarSitioEtiqueta(Request $request){
        $id = $request->input('id');
        $resultado = etiquetassitios::find($id);
        $resultado->delete();
        return "ok";
    }

    public function agregarSitioEtiqueta(){
        return view('adminSitio.agregar2');
    }

    ////////////////////////////////////////////////////////////////

    // Función para mostrar la página de administración del grupo
    public function adminEtiqueta(){
        return view('adminEtiqueta.admin');
    }

    public function listarEtiqueta(){
        $etiquetas = etiquetas::all();
        return response()->json($etiquetas);
    }

    // Función para crear un nuevo usuario
    public function crearEtiqueta(Request $request){
        $nom_etiqueta = $request->input('nom_etiqueta');
        $etiqueta = new etiquetas();
        $etiqueta->nom_etiqueta = $nom_etiqueta;
        $etiqueta->save();
        return redirect()->route('adminEtiqueta');
    }

    public function updateEtiqueta(Request $request, etiquetas $etiqueta){
        $etiqueta->nom_etiqueta = $request->nom_etiqueta;
        $etiqueta->save();
        return redirect()->route('adminEtiqueta', $etiqueta->id);
    }


    // Función para editar una prueba
    public function editarEtiqueta($id){
        $etiqueta = etiquetas::find($id);
        return view('adminEtiqueta.editar', compact('etiqueta'));
    }

    public function eliminarEtiqueta(Request $request){
        $id = $request->input('id');
        $resultado = etiquetassitios::where('id_etiqueta', $id);
        $resultado->delete();
        $resultado3 = etiquetas::find($id);
        $resultado3->delete();
        return "ok";
    }

    public function agregarEtiqueta(){
        return view('adminEtiqueta.agregar');
    }
}