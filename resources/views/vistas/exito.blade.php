<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éxito</title>
</head>

<body>
    <h1>¡Inicio de sesión exitoso!</h1>
    <p>Bienvenido, has iniciado sesión correctamente.</p>

    <h2>Detalles de inicio de sesión:</h2>
    <p>Nombre: {{ session('nombre') }}</p>
    <p>Apellido: {{ session('apellido') }}</p>
    <p>Correo electrónico: {{ session('email') }}</p>
    <p>Rol: {{ session('rol') == 0 ? 'Administrador' : 'Usuario' }}</p>
</body>
</html>
