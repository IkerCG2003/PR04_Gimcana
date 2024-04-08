@extends('layouts/plantilla')
@section('title', 'Gincana')
@section('content')

    @foreach ($etiquetassitios as $etiquetasitio)
    @endforeach

    <div id="map">
    </div>

    <div id="infoabajo">
        <div class="infoSitio">

            <div class="nuevoSitio">
                
            </div>

            @foreach ($sitios as $sitio)
                <div class="sitioMapaInfo">
                    <h4>{{ $sitio->nom_sitio }}</h4>
                    <p>{{ $sitio->ubi_sitio }}</p>

                    <div class="etiquetasSitios">
                        @foreach ($etiquetassitios as $etiquetasitio)
                            @if ($sitio->id === $etiquetasitio->id_sitio)
                                <p>{{ $etiquetasitio->etiquetaRel->nom_etiqueta }}</p>
                            @endif
                        @endforeach
                    </div>

                    <div class="botonesSitios">
                        <button><i class="fa-solid fa-diamond-turn-right"></i> Como llegar</button>
                        <button><i class="fa-solid fa-circle-info"></i> Mas info</button>
                    </div>
                </div>
                <div class="separacionSitios"></div>
            @endforeach

        </div>
    </div>

@endsection
