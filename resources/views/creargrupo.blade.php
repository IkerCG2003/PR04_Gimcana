@extends('layouts/plantilla2')
@section('title', 'Crear Grupo')
@section('content')

    <div class="formcreargrupo">
        <h2>Nuevo Grupo</h2>
        {{-- <form class="nuevogrupo" id="nuevogrupo" action="{{ route('nuevogrupo') }}" method="POST"> --}}
        <form  class="nuevogrupo">
            @csrf
            <label for="nombre_grupo">Nombre grupo:</label>
            <input type="text" id="nombre_grupo" name="nombre_grupo" value="{{ old('nombre_grupo') }}" required>
            <br>
            <label for="capacidad_grupo">Capacidad grupo:</label>
            <select name="capacidad_grupo" id="capacidad_grupo" value="{{ old('capacidad_grupo') }}" required>
                <option value=""  selected disabled hidden>Seleccione Capacidad</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <br>
            <input type="text" id="id_usuario" name="id_usuario" value="{{ old('id_usuario') }}" required hidden>
            <button type="submit">Crear grupo</button>
        </form>
    </div>

@endsection
