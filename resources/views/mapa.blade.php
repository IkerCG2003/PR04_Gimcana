@extends('layouts/plantilla')
@section('title', 'Gincana')
@section('content')

    @foreach ($etiquetassitios as $etiquetasitio)
    @endforeach

    <div id="map">
    </div>

    <div id="infoabajo">
        <div class="infoSitio">
            @foreach ($sitios as $sitio)
                <h4>{{ $sitio->nom_sitio }}</h4>
                <p>{{ $sitio->ubi_sitio }}</p>

                @if ($sitio->id === $etiquetasitio->sitioRel->id)
                    <div class="etiquetasSitios">
                        @foreach ($etiquetassitios as $etiquetasitio)
                            <p>{{ $etiquetasitio->etiquetaRel->nom_etiqueta }}</p>
                        @endforeach
                    </div>
                @endif

                <div class="botonesSitios">
                    <button><i class="fa-solid fa-diamond-turn-right"></i> Como llegar</button>
                    <button><i class="fa-solid fa-circle-info"></i> Mas info</button>
                </div>
                <div class="separacionSitios"></div>
            @endforeach
        </div>
    </div>

@endsection
