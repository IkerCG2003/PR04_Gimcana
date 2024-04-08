<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuarios;

use function Laravel\Prompts\alert;

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
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 9 caracteres',
            'password.max' => 'La contraseña no debe tener más de 20 caracteres',
        ]);
        // Recuperamos el usuario por su correo electrónico
        $user = Usuarios::where('email_usuario', $credentials['email'])->first();
        // Verificamos si el usuario existe y si la contraseña es correcta
        if ($user && password_verify($credentials['password'], $user->pwd_usuario)) {
            // Autenticación exitosa, establecer variables de sesión
            $request->session()->put('id', $user->id);
            $request->session()->put('nombre', $user->nom_usuario);
            $request->session()->put('apellido', $user->apell_usuario);
            $request->session()->put('email', $user->email_usuario);
            $request->session()->put('rol', $user->rol_usuario);
            if ($user->rol_usuario == '2') {
                // Redirigir al usuario administrador a la página de administración
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/mapa');
            }

        } else {
            // Autenticación fallida, redirigir de vuelta con un mensaje de error
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }
    }

    public function mapa(Request $request)
    {
        // Verificar si el usuario ha iniciado sesión
        if ($request->session()->has('nombre') && $request->session()->has('apellido') && $request->session()->has('email') && $request->session()->has('rol')) {
            // El usuario ha iniciado sesión, mostrar la página de éxito
            return view('mapa');
        } else {
            // El usuario no ha iniciado sesión, redirigir al inicio de sesión con un mensaje de error
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página');
        }
    }

    public function logout(Request $request)
    {
        // Eliminar las variables de sesión
        $request->session()->flush();
        // Redirigir al usuario a la página de inicio de sesión
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    }
}
