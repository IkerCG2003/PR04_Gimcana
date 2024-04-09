@extends('layouts/plantilla2')
@section('title', 'Crear Etiqueta')
@section('content')

    <div class="formcreargrupo">
        <h2>Nueva Etiqueta</h2>
        <form class="formularios" id="etiquetaUsuarioCrear" action="{{ route('etiquetaUsuarioCrear') }}" method="POST">
            @csrf
            <label for="nombre_etiqueta">Nombre etiqueta:</label>
            <input type="text" id="nombre_etiqueta" name="nombre_etiqueta" value="{{ old('nombre_etiqueta') }}" required>
            <br>
            <button type="submit">Crear etiqueta</button>
        </form>
    </div>



@endsection
