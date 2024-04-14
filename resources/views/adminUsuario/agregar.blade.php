@extends('layouts.plantilla_admin')
@section('title', 'Agregar Usuario')
@section('content')

    <div class="editar">
        <a href="{{ route('admin') }}"><i class="atras fa-solid fa-arrow-left fa-xl"></i></a>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="formAgregarUsuario" id="formAgregarUsuario" action="{{ route('crearUsuario') }}" method="POST">
            @csrf
            <label for="nom_usuario">Nombre del usuario:</label>
            <input type="text" id="nom_usuario" name="nom_usuario" value="{{ old('nom_usuario') }}" required>

            <label for="apell_usuario">Apellido usuario:</label>
            <input type="text" id="apell_usuario" name="apell_usuario" value="{{ old('apell_usuario') }}" required>

            <label for="email_usuario">Correo:</label>
            <input type="text" id="email_usuario" name="email_usuario" value="{{ old('email_usuario') }}" required>

            <label for="pwd_usuario">Contraseña:</label>
            <input type="text" id="pwd_usuario" name="pwd_usuario" value="{{ old('pwd_usuario') }}" required>

            <label for="rol_usuario">Rol:</label>
            <input type="number" id="rol_usuario" name="rol_usuario" value="{{ old('rol_usuario') }}" required>

            <button type="submit" class="agregarbtn">Agregar Usuario</button>
        </form>
    </div>

@endsection