@extends('layouts.plantilla_admin')
@section('title', 'Agregar Gimcana')
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
        <form class="formAgregarGimcana" id="formAgregarGimcana" action="{{ route('crearGimcana') }}" method="POST">
            @csrf
            <label for="nombre_gimcana">Nombre del Gimcana:</label>
            <input type="text" id="nombre_gimcana" name="nombre_gimcana" value="{{ old('nombre_gimcana') }}" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion_gimcana" rows="4" class="scrolleditar" required>{{ old('descripcion_gimcana') }}</textarea>
            <button type="submit" class="agregarbtn">Agregar Gimcana</button>
        </form>
    </div>

@endsection