@extends('plantilla')
@section('title', 'Gincana')
@section('content')

    <div id="paginamapa">

        <div id="map"></div>

    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>

@endsection
