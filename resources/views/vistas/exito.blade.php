<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éxito</title>
</head>

<body>
    @if (session('nombre') && session('apellido') && session('email') && session('rol'))
        <h1>¡Inicio de sesión exitoso!</h1>
        <p>Bienvenido, has iniciado sesión correctamente.</p>
        <h2>Detalles de inicio de sesión:</h2>
        <p>Nombre: {{ session('nombre') }}</p>
        <p>Apellido: {{ session('apellido') }}</p>
        <p>Correo electrónico: {{ session('email') }}</p>
        <p>Rol: {{ session('rol') == 0 ? 'Administrador' : 'Usuario' }}</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <li class="nav-item">
                <i class="fa-solid fa-right-from-bracket"></i> <button
                    type="submit">Logout</button>
            </li>
        </form>
    @else
        {{-- Establecer el mensaje de error --}}
        @php
            session()->flash('error', 'Debes iniciar sesión para acceder a esta página');
        @endphp

        {{-- Redireccionar al usuario a la página de inicio de sesión --}}
        <script>
            window.location = "{{ route('login') }}";
        </script>
    @endif
</body>
</html>
