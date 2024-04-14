@extends('layouts.plantilla_admin')
@section('title', 'Agregar Prueba')
@section('content')

    <div class="editar">
        <a href="{{ route('adminPrueba') }}"><i class="atras fa-solid fa-arrow-left fa-xl"></i></a>
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
        <form class="formAgregarPrueba" id="formAgregarPrueba" action="{{ route('crearPrueba') }}" method="POST">
            @csrf
            <label for="nom_prueba">Nombre de la prueba:</label>
            <input type="text" id="nom_prueba" name="nom_prueba" value="{{ old('nom_prueba') }}" required>

            <label for="pista_prueba">Pista:</label>
            <input type="text" id="pista_prueba" name="pista_prueba" value="{{ old('pista_prueba') }}" required>

            <label for="estado_prueba">Estado de la prueba:</label>
            <input type="number" id="estado_prueba" name="estado_prueba" value="{{ old('estado_prueba ') }}" required>

            <button type="submit" class="agregarbtn">Agregar Prueba</button>
        </form>
    </div>

@endsection