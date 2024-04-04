<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapaController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('mapa', function () {
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