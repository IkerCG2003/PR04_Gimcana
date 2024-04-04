<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- Estilos --}}
    <link rel="stylesheet" href="{{asset ('css/login.css')}}">
    {{--Logo --}}
    <link rel="shortcut icon" href="{{asset ('img/logo.png')}}">
    {{-- Título --}}
    <title>Login | Jincana</title>
</head>

<body>        
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('register.post') }}" method="POST" class="login-form">
                    <h2 class="mb-4">Registrar usuario</h2>
                    @csrf

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                
                    {{-- @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif         --}}

                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="nombre" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ingresa tu nombre">
                        @error('nombre')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="apellido">Apellidos:</label>
                        <input type="apellido" name="apellido" id="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}" placeholder="Ingresa tus apellidos">
                        @error('apellido')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Ingresa tu email">
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password-1">Contraseña:</label>
                        <input type="password" name="password-1" id="password-1" class="form-control @error('password-1') is-invalid @enderror" placeholder="Ingresa tu contraseña">
                        @error('password-1')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password-2">Repite la contraseña:</label>
                        <input type="password" name="password-1_confirmation" id="password-2" class="form-control @error('password-2') is-invalid @enderror" placeholder="Repite tu contraseña">
                        @error('password-2')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                                        
                    <button type="submit" class="btn btn-primary">Registrar</button>
                                        
                    <a href="{{ route('login') }}"><p>¿Ya tienes cuenta? Inicia sesión aquí.</p></a>
                </form> 
            </div>
        </div>
    </div>
</body>
</html>