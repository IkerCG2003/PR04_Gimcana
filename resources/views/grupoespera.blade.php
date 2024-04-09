@extends('layouts/plantilla2')
@section('title', 'Menu Gimcana')
@section('content')

    @foreach ($grupos as $grupo)
    @endforeach
    @foreach ($usuariosgrupos as $usuariogrupo)
    @endforeach

    <div class="esperagimcana">
        @if ($usuariogrupo->id_usuario === session('id'))
            <h4>{{ $usuariogrupo->grupoRel->nombre_grupo }}</h4>
        @endif
        <br>
        <h5>Espere mientras empieza la gimcana</h5>
        <div class="contenedor-loader">
            <div class="loader1"></div>
            <div class="loader2"></div>
            <div class="loader3"></div>
            <div class="loader4"></div>
        </div>
    </div>

@endsection
