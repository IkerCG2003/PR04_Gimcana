<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\MapaController;
use App\Http\Controllers\AdminGimcanaController;

Route::get('/', function () {
    return view('welcome');
});




// SESIONES

/* Rutas del login */
Route::get('/login', function () {
    return view('vistas.login');
})->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');

/* Rutas del registro */
Route::get('/register', function () {
    return view('vistas.register');
})->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.post');

/* Ruta de logout */
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* Ruta de Éxito */
Route::get('/mapa', [LoginController::class, 'mapa'])->name('mapa');







// PAGINAS

Route::get('mapa', function () {
    return app()->make(MapaController::class)->mapa();
})->name('mapa');

Route::get('creargrupo', function () {
    return app()->make(MapaController::class)->creargrupo();
})->name('creargrupo');

Route::post('creargrupo', [MapaController::class, 'nuevoGrupo'])->name('nuevoGrupo');

Route::get('todasgimcanas', function () {
    return app()->make(MapaController::class)->todasgimcanas();
})->name('todasgimcanas');

Route::get('grupoespera', function () {
    return app()->make(MapaController::class)->grupoespera();
})->name('grupoespera');

// Admin Gimcanas

Route::get('/admin/gimcana', [AdminGimcanaController::class, 'admin'])->name('admin');

Route::get('/admin/gimcana/agregar', [AdminGimcanaController::class, 'agregar'])->name('agregar');

Route::post('/admin/gimcana/agregar', [AdminGimcanaController::class, 'crearGimcana'])->name('crearGimcana');

Route::post('/listar', [AdminGimcanaController::class, 'listar'])->name('listar');

Route::post('/eliminar', [AdminGimcanaController::class, 'eliminar'])->name('eliminar');

Route::get('/admin/gimcana/editar/{id}', function ($id) {
    return app()->make(AdminGimcanaController::class)->editar($id);
})->name('admin.editar');

Route::put('/admin/gimcana/editar/{gimcana}',[AdminGimcanaController::class, 'update'])->name('admin.update');

// Admin Usuarios

Route::get('/admin/usuario', [AdminGimcanaController::class, 'adminUsuario'])->name('adminUsuario');

Route::get('/admin/usuario/agregar', [AdminGimcanaController::class, 'agregarUsuario'])->name('agregarUsuario');

Route::post('/admin/usuario/agregar', [AdminGimcanaController::class, 'crearUsuario'])->name('crearUsuario');

Route::post('/listarUsuario', [AdminGimcanaController::class, 'listarUsuario'])->name('listarUsuario');

Route::post('/eliminarUsuario', [AdminGimcanaController::class, 'eliminarUsuario'])->name('eliminarUsuario');

Route::get('/admin/usuario/editar/{id}', function ($id) {
    return app()->make(AdminGimcanaController::class)->editarUsuario($id);
})->name('adminUsuario.editarUsuario');

Route::put('/admin/usuario/editar/{usuario}',[AdminGimcanaController::class, 'updateUsuario'])->name('adminUsuario.updateUsuario');

// Admin Grupos

Route::get('/admin/grupo', [AdminGimcanaController::class, 'adminGrupo'])->name('adminGrupo');

Route::get('/admin/grupo/agregar', [AdminGimcanaController::class, 'agregarGrupo'])->name('agregarGrupo');

Route::post('/admin/grupo/agregar', [AdminGimcanaController::class, 'crearGrupo'])->name('crearGrupo');

Route::post('/listarGrupo', [AdminGimcanaController::class, 'listarGrupo'])->name('listarGrupo');

Route::post('/eliminarGrupo', [AdminGimcanaController::class, 'eliminarGrupo'])->name('eliminarGrupo');

Route::get('/admin/grupo/editar/{id}', function ($id) {
    return app()->make(AdminGimcanaController::class)->editarGrupo($id);
})->name('adminGrupo.editarGrupo');

Route::put('/admin/grupo/editar/{grupo}',[AdminGimcanaController::class, 'updateGrupo'])->name('adminGrupo.updateGrupo');

// Admin Grupos-Gimcanas

Route::get('/admin/grupogimcana/agregar', [AdminGimcanaController::class, 'agregarGrupoGimcana'])->name('agregarGrupoGimcana');

Route::post('/admin/grupogimcana/agregar', [AdminGimcanaController::class, 'crearGrupoGimcana'])->name('crearGrupoGimcana');

Route::post('/listarGrupoGimcana', [AdminGimcanaController::class, 'listarGrupoGimcana'])->name('listarGrupoGimcana');

Route::post('/eliminarGrupoGimcana', [AdminGimcanaController::class, 'eliminarGrupoGimcana'])->name('eliminarGrupoGimcana');

Route::get('/admin/grupogimcana/editar/{id}', function ($id) {
    return app()->make(AdminGimcanaController::class)->editarGrupoGimcana($id);
})->name('adminGrupo.editarGrupoGimcana');

Route::put('/admin/grupo/grupogimcana/{grupogimcana}',[AdminGimcanaController::class, 'updateGrupoGimcana'])->name('adminGrupoGimcana.updateGrupoGimcana');

// Admin Pruebas

Route::get('/admin/prueba', [AdminGimcanaController::class, 'adminPrueba'])->name('adminPrueba');

Route::get('/admin/prueba/agregar', [AdminGimcanaController::class, 'agregarPrueba'])->name('agregarPrueba');

Route::post('/admin/prueba/agregar', [AdminGimcanaController::class, 'crearPrueba'])->name('crearPrueba');

Route::post('/listarPrueba', [AdminGimcanaController::class, 'listarPrueba'])->name('listarPrueba');

Route::post('/eliminarPrueba', [AdminGimcanaController::class, 'eliminarPrueba'])->name('eliminarPrueba');

Route::get('/admin/prueba/editar/{id}', function ($id) {
    return app()->make(AdminGimcanaController::class)->editarPrueba($id);
})->name('adminPrueba.editarPrueba');

Route::put('/admin/prueba/editar/{prueba}',[AdminGimcanaController::class, 'updatePrueba'])->name('adminPrueba.updatePrueba');

// Admin Pruebas-Sitios

Route::get('/admin/pruebasitio/agregar', [AdminGimcanaController::class, 'agregarPruebaSitio'])->name('agregarPruebaSitio');

Route::post('/admin/pruebasitio/agregar', [AdminGimcanaController::class, 'crearPruebaSitio'])->name('crearPruebaSitio');

Route::post('/listarPruebaSitio', [AdminGimcanaController::class, 'listarPruebaSitio'])->name('listarPruebaSitio');

Route::post('/eliminarPruebaSitio', [AdminGimcanaController::class, 'eliminarPruebaSitio'])->name('eliminarPruebaSitio');

Route::get('/admin/pruebasitio/editar/{id}', function ($id) {
    return app()->make(AdminGimcanaController::class)->editarPruebaSitio($id);
})->name('adminPrueba.editarPruebaSitio');

Route::put('/admin/prueba/pruebasitio/{pruebasitio}',[AdminGimcanaController::class, 'updatePruebaSitio'])->name('adminPruebaSitio.updatePruebaSitio');

// Admin Sitios

Route::get('/admin/sitio', [AdminGimcanaController::class, 'adminSitio'])->name('adminSitio');

Route::get('/admin/sitio/agregar', [AdminGimcanaController::class, 'agregarSitio'])->name('agregarSitio');

Route::post('/admin/sitio/agregar', [AdminGimcanaController::class, 'crearSitio'])->name('crearSitio');

Route::post('/listarSitio', [AdminGimcanaController::class, 'listarSitio'])->name('listarSitio');

Route::post('/eliminarSitio', [AdminGimcanaController::class, 'eliminarSitio'])->name('eliminarSitio');

Route::get('/admin/sitio/editar/{id}', function ($id) {
    return app()->make(AdminGimcanaController::class)->editarSitio($id);
})->name('adminSitio.editarSitio');

Route::put('/admin/sitio/editar/{sitio}',[AdminGimcanaController::class, 'updateSitio'])->name('adminSitio.updateSitio');

// Admin Sitios-Etiquetas

Route::get('/admin/sitioetiqueta/agregar', [AdminGimcanaController::class, 'agregarSitioEtiqueta'])->name('agregarSitioEtiqueta');

Route::post('/admin/sitioetiqueta/agregar', [AdminGimcanaController::class, 'crearSitioEtiqueta'])->name('crearSitioEtiqueta');

Route::post('/listarSitioEtiqueta', [AdminGimcanaController::class, 'listarSitioEtiqueta'])->name('listarSitioEtiqueta');

Route::post('/eliminarSitioEtiqueta', [AdminGimcanaController::class, 'eliminarSitioEtiqueta'])->name('eliminarSitioEtiqueta');

Route::get('/admin/sitioetiqueta/editar/{id}', function ($id) {
    return app()->make(AdminGimcanaController::class)->editarSitioEtiqueta($id);
})->name('adminSitio.editarSitioEtiqueta');

Route::put('/admin/sitio/sitioetiqueta/{sitioetiqueta}',[AdminGimcanaController::class, 'updateSitioEtiqueta'])->name('adminSitioEtiqueta.updateSitioEtiqueta');

// Admin Etiquetas

Route::get('/admin/etiqueta', [AdminGimcanaController::class, 'adminEtiqueta'])->name('adminEtiqueta');

Route::get('/admin/etiqueta/agregar', [AdminGimcanaController::class, 'agregarEtiqueta'])->name('agregarEtiqueta');

Route::post('/admin/etiqueta/agregar', [AdminGimcanaController::class, 'crearEtiqueta'])->name('crearEtiqueta');

Route::post('/listarEtiqueta', [AdminGimcanaController::class, 'listarEtiqueta'])->name('listarEtiqueta');

Route::post('/eliminarEtiqueta', [AdminGimcanaController::class, 'eliminarEtiqueta'])->name('eliminarEtiqueta');

Route::get('/admin/etiqueta/editar/{id}', function ($id) {
    return app()->make(AdminGimcanaController::class)->editarEtiqueta($id);
})->name('adminEtiqueta.editarEtiqueta');

Route::put('/admin/etiqueta/editar/{etiqueta}',[AdminGimcanaController::class, 'updateEtiqueta'])->name('adminEtiqueta.updateEtiqueta');

// Menú gimcana

Route::get('{id}', function ($id) {
    return app()->make(MapaController::class)->menugimcana($id);
})->name('menugimcana');