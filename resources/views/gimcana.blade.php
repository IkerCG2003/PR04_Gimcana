@extends('layouts.plantillaGincana')
@section('title', 'Gincana')
@section('content')

<div id="map">
    {{-- Aquí se imprimirá el mapa con los puntos --}}
</div>

<div id="infoabajo">
    <div class="infoSitio">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif        

        {{-- <!-- Aquí se mostrará la información del sitio cuando se haga clic en un marcador --> --}}
    </div>
</div>

@endsection

@section('scripts')
<!-- Leaflet CSS + JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<!-- Tu archivo JavaScript -->
<script src="{{ asset('/js/coordenadas.js') }}"></script>
@endsection
