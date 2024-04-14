<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MapaController;
use App\Http\Controllers\CoordenadasController;
use App\Http\Controllers\AdminController;






// SESIONES

Route::get('/', function () {
    return view('vistas.login');
})->name('/');

Route::post('/', [LoginController::class, 'authenticate'])->name('login.post');

Route::get('/register', function () {
    return view('vistas.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/mapa', [LoginController::class, 'mapa'])->name('mapa');






// JAVASCRIPT

Route::get('/obtenerCoordenadas', [CoordenadasController::class, 'obtenerCoordenadas']);

Route::get('/js/coordenadas.js', [CoordenadasController::class, 'jsCoordenadas'])->name('js.coordenadas');

// -------
Route::post('/obtenerCoordenadasfiltro', [CoordenadasController::class, 'obtenerCoordenadasfiltro']);





// PAGINAS

Route::get('mapa', function () {
    return app()->make(MapaController::class)->mapa();
})->name('mapa');

Route::get('etiquetaUsuario', function () {
    return app()->make(MapaController::class)->etiquetaUsuario();
})->name('etiquetaUsuario');

Route::get('añadirEtiquetaSitio', function ($id) {
    return app()->make(MapaController::class)->añadirEtiquetaSitio($id);
})->name('añadirEtiquetaSitio');

Route::get('todasgimcanas', function () {
    return app()->make(MapaController::class)->todasgimcanas();
})->name('todasgimcanas');

Route::get('favoritos', function () {
    return app()->make(MapaController::class)->favoritos();
})->name('favoritos');

Route::get('grupoespera', function () {
    return app()->make(MapaController::class)->grupoespera();
})->name('grupoespera');

Route::get('{id}', function ($id) {
    return app()->make(MapaController::class)->menugimcana($id);
})->name('menugimcana');

Route::get('creargrupo/{idGimcana}', function ($id) {
    return app()->make(MapaController::class)->creargrupo($id);
})->name('creargrupo');

Route::post('creargrupo', [MapaController::class, 'nuevoGrupo'])->name('nuevoGrupo');

Route::post('menugimcana', [MapaController::class, 'unirseGrupo'])->name('unirseGrupo');

Route::post('etiquetaUsuario', [MapaController::class, 'etiquetaUsuarioCrear'])->name('etiquetaUsuarioCrear');

Route::post('añadirEtiquetaSitio', [MapaController::class, 'añadirEtiquetaSitioAccion'])->name('añadirEtiquetaSitioAccion');




// ADMIN

Route::get('/admin/admin', function () {
    return app()->make(AdminController::class)->admin();
})->name('admin');

Route::get('/admin/{id}', function ($id) {
    return app()->make(AdminController::class)->editar($id);
})->name('admin.editar');
