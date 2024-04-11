@extends('layouts.plantillaMapa')
@section('title', 'Gincana')
@section('content')

    <div id="map">
        {{-- Aquí se imprimirá el mapa con los puntos --}}
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
                        <a href="{{ route('añadirEtiquetaSitio') }}">
                            <p><i class="fa-solid fa-plus   "></i></p>
                        </a>
                    </div>
                </div>
                <div class="separacionSitios"></div>
            @endforeach

        </div>
    </div>

@endsection

@section('scripts')
    <!-- Leaflet CSS + JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Tu archivo JavaScript -->
    <script src="{{ asset('/js/puntos.js') }}"></script>
@endsection
