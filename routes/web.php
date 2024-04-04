<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\RegisterController; 

Route::get('/', function () {return view('welcome');});

/* Rutas del login */
Route::get('/login', function () {return view('vistas.login');})->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');

/* Rutas del register */
Route::get('/register', function () {return view('vistas.register');})->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.post');

Route::get('/exito', function () {return view('vistas.exito'); })->name('exito');
