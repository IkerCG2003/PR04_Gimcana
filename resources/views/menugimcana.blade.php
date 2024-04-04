@extends('layouts/plantilla2')
@section('title', 'Menu Gimcana')
@section('content')

    <div class="menugimcana">
        {{-- @foreach ($gruposgimcanas as $grupogimcana)
            <div class="grupogimcana">
                <h6> {{ $grupogimcana->grupo->numero_grupo }}</h6>
                <h4> {{ $grupogimcana->grupo->nombre_grupo }}</h4>
                <h5><i class="fa-solid fa-people-group fa-sm"></i> 1/{{ $grupogimcana->grupo->capacidad_grupo }}</h5>
            </div>
        @endforeach --}}
        <div class="grupogimcana">
            {{-- <h6> {{ $grupo->nombre_grupo }}</h6> --}}
            {{-- <h4> {{ $gimcana->grupo->nombre_grupo }}</h4>
            <h5><i class="fa-solid fa-people-group fa-sm"></i> 1/{{ $grupogimcana->grupo->capacidad_grupo }}</h5> --}}
        </div>
        <a href="{{ route('creargrupo') }}">
            <div class="creargupogimcana"><i class="fa-solid fa-plus"></i></div>
        </a>
    </div>

@endsection
