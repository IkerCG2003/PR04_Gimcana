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

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


/* Rutas del login */
Route::get('/login', function () {return view('vistas.login');})->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');

/* Rutas del register */
Route::get('/register', function () {return view('vistas.register');})->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.post');

Route::get('/exito', function () {return view('vistas.exito'); })->name('exito');







// PAGINAS

Route::get('mapa', function () {
    session_start();
    if (!isset($_SESSION['email'])) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página');
    }
    return app()->make(MapaController::class)->mapa();
})->name('mapa');

Route::get('creargrupo', function () {
    return app()->make(MapaController::class)->creargrupo();
})->name('creargrupo');

Route::get('grupoespera', function () {
    return app()->make(MapaController::class)->grupoespera();
})->name('grupoespera');

Route::get('{id}', function ($id) {
    return app()->make(MapaController::class)->menugimcana($id);
})->name('menugimcana');