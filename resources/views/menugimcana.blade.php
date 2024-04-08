@extends('layouts/plantilla2')
@section('title', 'Menu Gimcana')
@section('content')

    @foreach ($gruposgimcanas as $grupogimcana)
        <div class="menugimcana">
            <h2>Gimcana {{ $grupogimcana->id_gimcana }}</h2>
                <div id="map"></div>
                <a class="botonEntrarGrupo" href="">
                    <div class="grupogimcana">
                        <h4> {{ $grupogimcana->grupo->nombre_grupo }}</h4>
                        {{-- <button>Entrar</button> --}}
                        <h5>/{{ $grupogimcana->grupo->capacidad_grupo }} <i class="fa-solid fa-people-group fa-sm"></i></h5>
                    </div>
                </a>
            <a href="{{ route('creargrupo') }}">
                <div class="creargupogimcana"><i class="fa-solid fa-plus"></i></div>
            </a>
        </div>
    @endforeach
@endsection
