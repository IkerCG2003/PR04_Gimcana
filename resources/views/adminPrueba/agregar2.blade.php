@extends('layouts.plantilla_admin')
@section('title', 'Agregar Prueba-Sitio')
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
        <form class="formAgregarPruebaSitio" id="formAgregarPruebaSitio" action="{{ route('crearPruebaSitio') }}" method="POST">
            @csrf
            <label for="id_prueba">Id de la prueba:</label>
            <input type="number" id="id_prueba" name="id_prueba" value="{{ old('id_prueba') }}" required>

            <label for="id_sitio">Id del sitio:</label>
            <input type="number" id="id_sitio" name="id_sitio" value="{{ old('id_sitio') }}" required>

            <button type="submit" class="agregarbtn">Agregar Prueba y su Sitio</button>
        </form>
    </div>

@endsection