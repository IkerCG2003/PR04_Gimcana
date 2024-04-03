<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Éxito</title>
    </head>
    
    <body>
        <h1>¡Inicio de sesión exitoso!</h1>
        <p>Bienvenido, has iniciado sesión correctamente.</p>

        <h2>Detalles de inicio de sesión:</h2>
        <p>Correo electrónico: {{ session('email') }}</p>
        <p>Contraseña: {{ session('password') }}</p>
    </body>
</html>
