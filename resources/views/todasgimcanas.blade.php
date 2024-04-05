@extends('layouts/plantilla2')
@section('title', 'Gimcanas')
@section('content')

    <div class="todasgimcanas">
        {{-- @foreach ($gruposgimcanas as $grupogimcana)
            <div class="grupogimcana">
                <h6> {{ $grupogimcana->grupo->numero_grupo }}</h6>
                <h4> {{ $grupogimcana->grupo->nombre_grupo }}</h4>
                <h5><i class="fa-solid fa-people-group fa-sm"></i> 1/{{ $grupogimcana->grupo->capacidad_grupo }}</h5>
            </div>
        @endforeach --}}
        <h2>Gimcanas</h2>
        @foreach ($gimcanas as $gimcana)
            <a class="botonEntrarGrupo" href="">
                <div class="gimcanas">
                    <h4>{{ $gimcana->nombre_gimcana }}</h4>
                    <p>{{ $gimcana->descripcion_gimcana }}</p>
                </div>
            </a>
        @endforeach
        {{-- <a href="{{ route('creargrupo') }}">
            <div class="creargupogimcana"><i class="fa-solid fa-plus"></i></div>
        </a> --}}

    </div>

@endsection
