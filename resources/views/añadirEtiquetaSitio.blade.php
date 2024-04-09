@extends('layouts/plantilla2')
@section('title', 'Crear Etiqueta')
@section('content')

    <div class="formcreargrupo">
        <h2>Nueva Etiqueta</h2>
        <form class="formularios" id="etiquetaUsuarioCrear" action="{{ route('etiquetaUsuarioCrear') }}" method="POST">
            @csrf
            <label for="nombre_etiqueta">Nombre etiqueta:</label>

            <select name="id_sitio" id="id_sitio" value="{{ old('id_sitio') }}" required>
                <option value="" selected disabled hidden>Seleccione Capacidad</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>

            <input type="text" id="nombre_etiqueta" name="nombre_etiqueta" value="{{ old('nombre_etiqueta') }}" required>
            <br>
            <button type="submit">Crear etiqueta</button>
        </form>
    </div>



@endsection
