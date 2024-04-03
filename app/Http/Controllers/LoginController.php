<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:9|max:20',
        ], [
            'email.required' => 'El campo correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.min' => 'La contraseña debe tener al menos 9 caracteres',
            'password.max' => 'La contraseña no debe tener más de 20 caracteres',
        ]);

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, establecer variables de sesión
            $user = Auth::user();
            $request->session()->put('email', $user->email_usuario);
            $request->session()->put('rol', $user->rol_usuario); // Guardar el rol en la sesión

            // Redirigir al usuario a la página de éxito
            return redirect()->route('exito');
        } else {
            // Autenticación fallida, redirigir de vuelta con un mensaje de error
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }
    }
}
