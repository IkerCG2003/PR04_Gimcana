<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('mapa', function () {
    // session_start();
    // if (!isset($_SESSION['email'])) {
    //     return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página');
    // }
    return app()->make(MapaController::class)->mapa();
})->name('mapa');