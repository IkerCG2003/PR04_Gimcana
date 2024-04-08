@extends('layouts/plantilla2')
@section('title', 'Menu Gimcana')
@section('content')

    @foreach ($gruposgimcanas as $grupogimcana)
    @endforeach

    <div class="menugimcana">
        {{-- @foreach ($gruposgimcanas as $grupogimcana)
            <div class="grupogimcana">
                <h6> {{ $grupogimcana->grupo->numero_grupo }}</h6>
                <h4> {{ $grupogimcana->grupo->nombre_grupo }}</h4>
                <h5><i class="fa-solid fa-people-group fa-sm"></i> 1/{{ $grupogimcana->grupo->capacidad_grupo }}</h5>
            </div>
        @endforeach --}}
        <h2>Gimcana {{ $grupogimcana->id_gimcana }}</h2>
        @foreach ($gruposgimcanas as $grupogimcana)
            <a class="botonEntrarGrupo" href="">
                <div class="grupogimcana">
                    <h4> {{ $grupogimcana->grupo->nombre_grupo }}</h4>
                    {{-- <button>Entrar</button> --}}
                    <h5>/{{ $grupogimcana->grupo->capacidad_grupo }} <i class="fa-solid fa-people-group fa-sm"></i></h5>
                </div>
            </a>
        @endforeach
        <a href="{{ route('creargrupo') }}">
            <div class="creargupogimcana"><i class="fa-solid fa-plus"></i></div>
        </a>

    </div>

@endsection
