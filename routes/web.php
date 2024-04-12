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

Route::post('/listar', [AdminGimcanaController::class, 'listar'])->name('listar');

Route::post('/admin/gimcana/agregar', function () {
    return app()->make(AdminGimcanaController::class)->agregar();
})->name('admin.agregar');

// Route::post('/registrar', [AdminGimcanaController::class, 'agregarEditar'])->name('register');

// Route::get('/admin/gimcana/{id}', function ($id) {
//     return app()->make(AdminGimcanaController::class)->editar($id);
// })->name('admin.editar');

// Route::post('/eliminar', [AdminGimcanaController::class, 'eliminar'])->name('eliminar');

// route::put('/admin/gimcana/{gimcana}',[AdminGimcanaController::class, 'update'])->name('admin.update');

// Route::get('{id}', function ($id) {
//     return app()->make(MapaController::class)->menugimcana($id);
// })->name('menugimcana');