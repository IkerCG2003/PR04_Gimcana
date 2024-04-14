@extends('layouts.plantilla_admin')
@section('title', 'Agregar Sitio')
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
        <form class="formAgregarSitio" id="formAgregarSitio" action="{{ route('crearSitio') }}" method="POST">
            @csrf
            <label for="nom_sitio">Nombre del sitio:</label>
            <input type="text" id="nom_sitio" name="nom_sitio" value="{{ old('nom_sitio') }}" required>

            <label for="ubi_sitio">Ubicación del sitio:</label>
            <input type="text" id="ubi_sitio" name="ubi_sitio" value="{{ old('ubi_sitio') }}" required>

            <label for="ico_sitio">Icono del sitio:</label>
            <input type="text" id="ico_sitio" name="ico_sitio" value="{{ old('ico_sitio') }}" required>

            <button type="submit" class="agregarbtn">Agregar Sitio</button>
        </form>
    </div>

@endsection