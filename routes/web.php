<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\MapaController;
use App\Http\Controllers\AdminController;

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

Route::get('{id}', function ($id) {
    return app()->make(MapaController::class)->menugimcana($id);
})->name('menugimcana');






// PAGINAS ADMIN

Route::group(['prefix' => 'admin'], function () {

    Route::get('admin', function () {
        return app()->make(AdminController::class)->admin();
    })->name('admin.admin');

    // Route::get('agregar', function () {
    //     session_start();
    //     if (!isset($_SESSION['email'])) {
    //         return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página');
    //     }
    //     return app()->make(AdminController::class)->agregar();
    // })->name('admin.agregar');

    // Route::post('agregar', [AdminController::class, 'crearRestaurante'])->name('admin.crearRestaurante');

    // Route::get('{id}', function ($id) {
    //     session_start();
    //     if (!isset($_SESSION['email'])) {
    //         return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página');
    //     }
    //     return app()->make(AdminController::class)->editar($id);
    // })->name('admin.editar');

    // Route::put('{restaurante}', function ($restaurante) {
    //     session_start();
    //     if (!isset($_SESSION['email'])) {
    //         return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página');
    //     }
    //     return app()->make(AdminController::class)->update($restaurante);
    // })->name('admin.update');
});