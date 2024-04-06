@extends('layouts/plantilla2')
@section('title', 'Menu Gimcana')
@section('content')

    @foreach ($gruposgimcanas as $grupogimcana)
    @endforeach
    @foreach ($grupos as $grupo)
    @endforeach
    @foreach ($usuariosgrupos as $usuariogrupo)
    @endforeach

    <div class="menugimcana">

        <h2>Gimcana {{ $grupogimcana->id_gimcana }}</h2>

        @foreach ($gruposgimcanas as $grupogimcana)
            @php
                $contador = $usuariosgrupos->where('id_grupo', $grupogimcana->grupo->id)->count();
            @endphp

            @if ($usuariosgrupos->where('id_grupo', $grupogimcana->grupo->id)->count() !== $grupogimcana->grupo->capacidad_grupo)
                <a class="botonEntrarGrupo" href="">
                    <div class="grupogimcana">
                        <h4>{{ $grupogimcana->grupo->nombre_grupo }}</h4>
                        <h5>{{ $contador }}/{{ $grupogimcana->grupo->capacidad_grupo }} <i
                                class="fa-solid fa-people-group fa-sm"></i></h5>
                    </div>
                </a>
            @else
                <div class="grupogimcanaLleno">
                    <h4>{{ $grupogimcana->grupo->nombre_grupo }}</h4>
                    <p>Grupo lleno</p>
                    <h5>{{ $contador }}/{{ $grupogimcana->grupo->capacidad_grupo }} <i
                            class="fa-solid fa-people-group fa-sm"></i></h5>
                </div>
            @endif
        @endforeach

        <a href="{{ route('creargrupo') }}">
            <div class="creargupogimcana"><i class="fa-solid fa-plus"></i></div>
        </a>

    </div>

@endsection
