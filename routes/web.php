<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\MapaController;
use App\Http\Controllers\CoordenadasController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para las SESIONES

/* Rutas del login */
Route::get('/login', function () {return view('vistas.login');})->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');

/* Rutas del registro */
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.post');

/* Ruta de logout */
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* Ruta de Éxito */
Route::get('/mapa', [MapaController::class, 'mapa'])->name('mapa');

/* Coordenadas */
Route::get('/obtenerCoordenadas', [CoordenadasController::class, 'obtenerCoordenadas']);
Route::get('/js/coordenadas.js', [CoordenadasController::class, 'jsCoordenadas'])->name('js.coordenadas');

// Rutas para las PAGINAS
Route::get('creargrupo', [MapaController::class, 'creargrupo'])->name('creargrupo');
Route::post('creargrupo', [MapaController::class, 'nuevoGrupo'])->name('nuevoGrupo');

Route::get('todasgimcanas', [MapaController::class, 'todasgimcanas'])->name('todasgimcanas');
Route::get('grupoespera', [MapaController::class, 'grupoespera'])->name('grupoespera');
Route::get('{id}', [MapaController::class, 'menugimcana'])->name('menugimcana');
