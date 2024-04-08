<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Fontawseome --}}
    <script src="https://kit.fontawesome.com/8e6d3dccce.js" crossorigin="anonymous"></script>    
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- Estilos --}}
    <link rel="stylesheet" href="{{asset ('css/login.css')}}">
    {{-- Logo --}}
    <link rel="shortcut icon" href="{{asset ('img/logo.png')}}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-odKNlp6EOVHQdWDASv/mcKo2eApZEAdWqCXf9ORJ16pM2nE0ZyqVx1Nt9k5Do2X1Fd2R8xZydz3RzVbmqRkGCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Título --}}
    <title>Login | Jincana</title>
</head>

<body>       
    <div class="imglogin">
        <img src="{{ 'img/LOGO_NEGRO.png' }}" alt="">
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('login.post') }}" method="POST" class="login-form">
                    <h2 class="mb-4">Inicio de sesión</h2>
                    @csrf

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif        

                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Ingresa tu email">
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ingresa tu contraseña">
                            <button type="button" id="password-toggle-btn" class="btn btn-outline-secondary btn-icon" onclick="togglePasswordVisibility()">
                                <i class="far fa-eye"></i> <!-- Ícono del ojo abierto -->
                            </button>
                        </div>
                        @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="btn-form">Iniciar sesión</button>
                                        
                    <a href="{{ route('register') }}"><p>¿No tienes cuenta? Registrate aquí.</p></a>
                </form> 
            </div>
        </div>
    </div>

    <!-- Scripts JavaScript -->
    <script>
        // Función para alternar la visibilidad de la contraseña
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var passwordToggleBtn = document.getElementById("password-toggle-btn");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordToggleBtn.innerHTML = '<i class="far fa-eye-slash"></i>'; // Cambiar ícono a ojo tachado
            } else {
                passwordInput.type = "password";
                passwordToggleBtn.innerHTML = '<i class="far fa-eye"></i>'; // Cambiar ícono a ojo abierto
            }
        }
    </script>
</body>
</html>