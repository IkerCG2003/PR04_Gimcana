<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuarios;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tbl_usuarios,email_usuario',
            'password-1' => 'required|string|min:6|confirmed',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'Los apellidos son obligatorios.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, introduce un correo electrónico válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'password-1.required' => 'La contraseña es obligatoria.',
            'password-1.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password-1.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        // Crear una instancia de usuario
        $usuario = new Usuarios();
        $usuario->nom_usuario = $request->nombre;
        $usuario->apell_usuario = $request->apellido;
        $usuario->email_usuario = $request->email;
        $usuario->pwd_usuario = bcrypt($request->input('password-1'));
        $usuario->rol_usuario = 1; // Rol por defecto: Usuario

        // Verificar si el usuario ya existe
        $usuarioExists = Usuarios::where('email_usuario', $request->email)->exists();
        if ($usuarioExists) {
            return redirect()->back()->withInput()->withErrors(['email' => 'El correo electrónico ya está registrado.']);
        }
        
        // Guardar el usuario
        $usuario->save();

        return redirect()->route('login')->with('success', 'Usuario registrado exitosamente.');
    }
}
