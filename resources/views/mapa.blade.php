@extends('layouts.plantilla')
@section('title', 'Gincana')
@section('content')

    <div id="map">
        {{-- Aquí se imprimirá el mapa con los puntos --}}
    </div>

    <div id="infoabajo">
        <div class="infoSitio">
            {{-- <!-- Aquí se mostrará la información del sitio cuando se haga clic en un marcador --> --}}
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Leaflet CSS + JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        
    <!-- Tu archivo JavaScript -->
    <script src="{{ route('js.coordenadas') }}"></script>
@endsection
