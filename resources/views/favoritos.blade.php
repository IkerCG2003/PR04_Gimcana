@extends('layouts/plantilla2')
@section('title', 'Favoritos')
@section('content')

    @foreach ($favoritos as $favorito)
    @endforeach
    @foreach ($sitios as $sitio)
    @endforeach
    @foreach ($etiquetassitios as $etiquetasitio)
    @endforeach

    <div class="todasgimcanas">
        {{-- @foreach ($gruposgimcanas as $grupogimcana)
            <div class="grupogimcana">
                <h6> {{ $grupogimcana->grupo->numero_grupo }}</h6>
                <h4> {{ $grupogimcana->grupo->nombre_grupo }}</h4>
                <h5><i class="fa-solid fa-people-group fa-sm"></i> 1/{{ $grupogimcana->grupo->capacidad_grupo }}</h5>
            </div>
        @endforeach --}}
        <h2><i class="fa-solid fa-star"></i> Favoritos</h2>

        @if ($favorito->usuario->id === session('id'))
            @foreach ($favoritos as $favorito)
                <div class="gimcanas">
                    <div class="izqGimcanas">
                        <h4>{{ $favorito->sitioRel->nom_sitio }}</h4>
                        <p>{{ $favorito->sitioRel->ubi_sitio }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
