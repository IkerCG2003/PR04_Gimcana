@extends('layouts/plantilla')
@section('title', 'Gincana')
@section('content')

    <div id="map"></div>

    <div id="infoabajo">
        <div class="infoSitio">
        </div>
        {{-- @foreach ($sitios as $sitio)
            <p>{{ $sitio->nom_sitio }}</p>
            <p>{{ $sitio->ubi_sitio }}</p>
            <p>{{ $sitio->ico_sitio }}</p>
        @endforeach --}}
    </div>

@endsection
