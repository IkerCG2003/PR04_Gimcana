<?php

namespace App\Http\Controllers;

class LogoutController extends Controller
{
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        return redirect()->route('login')->with('success', '¡Sesión cerrada correctamente!');
    }
}