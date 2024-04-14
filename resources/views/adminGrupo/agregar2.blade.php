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
        <form class="formAgregarGrupoGimcana" id="formAgregarGrupoGimcana" action="{{ route('crearGrupoGimcana') }}" method="POST">
            @csrf
            <label for="id_grupo">Id del grupo:</label>
            <input type="text" id="id_grupo" name="id_grupo" value="{{ old('id_grupo') }}" required>

            <label for="id_gimcana">Id de la gimcana:</label>
            <input type="text" id="id_gimcana" name="id_gimcana" value="{{ old('id_gimcana') }}" required>

            <button type="submit" class="agregarbtn">Agregar Grupo y su Gimcana</button>
        </form>
    </div>

@endsection