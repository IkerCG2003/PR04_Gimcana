@extends('layouts.plantilla_admin')
@section('title', 'Agregar Etiqueta')
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
        <form class="formAgregarEtiqueta" id="formAgregarEtiqueta" action="{{ route('crearEtiqueta') }}" method="POST">
            @csrf
            <label for="nom_etiqueta">Nombre de la etiqueta:</label>
            <input type="text" id="nom_etiqueta" name="nom_etiqueta" value="{{ old('nom_etiqueta') }}" required>

            <button type="submit" class="agregarbtn">Agregar Etiqueta</button>
        </form>
    </div>

@endsection