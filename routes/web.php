<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('vistas.login');
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');

Route::get('/exito', function () {
    return view('vistas.exito'); 
})->name('exito');
