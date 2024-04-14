@extends('layouts.plantilla_admin')
@section('title', 'Agregar Grupo')
@section('content')

    <div class="editar">
        <a href="{{ route('adminGrupo') }}"><i class="atras fa-solid fa-arrow-left fa-xl"></i></a>
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
        <form class="formAgregarGrupo" id="formAgregarGrupo" action="{{ route('crearGrupo') }}" method="POST">
            @csrf
            <label for="numero_grupo">Número del grupo:</label>
            <input type="text" id="numero_grupo" name="numero_grupo" value="{{ old('numero_grupo') }}" required>

            <label for="nombre_grupo">Nombre del grupo:</label>
            <input type="text" id="nombre_grupo" name="nombre_grupo" value="{{ old('nombre_grupo') }}" required>

            <label for="capacidad_grupo">Capacidad del grupo:</label>
            <input type="text" id="capacidad_grupo" name="capacidad_grupo" value="{{ old('capacidad_grupo') }}" required>

            <label for="id_usuario">Creador del grupo:</label>
            <input type="text" id="id_usuario" name="id_usuario" value="{{ old('id_usuario ') }}" required>

            <button type="submit" class="agregarbtn">Agregar Grupo</button>
        </form>
    </div>

@endsection