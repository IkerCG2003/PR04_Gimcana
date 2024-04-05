<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\MapaController;

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

/* Ruta de Ã©xito */
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

Route::get('favoritos', function () {
    return app()->make(MapaController::class)->favoritos();
})->name('favoritos');

Route::get('grupoespera', function () {
    return app()->make(MapaController::class)->grupoespera();
})->name('grupoespera');

Route::get('{id}', function ($id) {
    return app()->make(MapaController::class)->menugimcana($id);
})->name('menugimcana');