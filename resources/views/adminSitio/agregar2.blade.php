@extends('layouts.plantilla_admin')
@section('title', 'Agregar Sitio-Etiqueta')
@section('content')

    <div class="editar">
        <a href="{{ route('adminSitio') }}"><i class="atras fa-solid fa-arrow-left fa-xl"></i></a>
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
        <form class="formAgregarSitioEtiqueta" id="formAgregarSitioEtiqueta" action="{{ route('crearSitioEtiqueta') }}" method="POST">
            @csrf
            <label for="id_etiqueta">Id de la etiqueta:</label>
            <input type="number" id="id_etiqueta" name="id_etiqueta" value="{{ old('id_etiqueta') }}" required>

            <label for="id_sitio">Id del sitio:</label>
            <input type="number" id="id_sitio" name="id_sitio" value="{{ old('id_sitio') }}" required>

            <button type="submit" class="agregarbtn">Agregar Etiqueta y su Sitio</button>
        </form>
    </div>

@endsection