@extends('layouts/plantilla2')
@section('title', 'Menu Gimcana')
@section('content')

@foreach ($usuariosgrupos as $usuariogrupo)
@endforeach

    <div class="menugimcana">

        @if ($usuariosgrupos->isEmpty())
            @foreach ($gimcanas as $gimcana)
                <h1>{{ $gimcana->nombre_gimcana }}</h1>
                <p>{{ $gimcana->descripcion_gimcana }}</p>

                @foreach ($gruposgimcanas as $grupogimcana)
                    @if ($grupogimcana->id_gimcana === $gimcana->id)
                        @php
                            $contador = $usuariosgrupos->where('id_grupo', $grupogimcana->grupo->id)->count();
                        @endphp
                        @if ($usuariosgrupos->where('id_grupo', $grupogimcana->grupo->id)->count() !== $grupogimcana->grupo->capacidad_grupo)
                            <form action="{{ route('menugimcana', ['id' => $grupogimcana->grupo->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="grupogimcana">
                                    <h4>{{ $grupogimcana->grupo->nombre_grupo }}</h4>
                                    <h5>{{ $contador }}/{{ $grupogimcana->grupo->capacidad_grupo }} <i
                                            class="fa-solid fa-people-group fa-sm"></i></h5>
                                </button>
                            </form>
                        @else
                            <div class="grupogimcanaLleno">
                                <h4>{{ $grupogimcana->grupo->nombre_grupo }}</h4>
                                <p>Grupo lleno</p>
                                <h5>{{ $contador }}/{{ $grupogimcana->grupo->capacidad_grupo }} <i
                                        class="fa-solid fa-people-group fa-sm"></i></h5>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach

            <a href="{{ route('creargrupo', ['idGimcana' => $id]) }}">
                <div class="creargupogimcana"><i class="fa-solid fa-plus"></i></div>
            </a>
        @else

            @if ($usuariogrupo->id_usuario !== session('id'))
                @foreach ($gimcanas as $gimcana)
                    <h1>{{ $gimcana->nombre_gimcana }}</h1>
                    <p>{{ $gimcana->descripcion_gimcana }}</p>

                    @foreach ($gruposgimcanas as $grupogimcana)
                        @if ($grupogimcana->id_gimcana === $gimcana->id)
                            @php
                                $contador = $usuariosgrupos->where('id_grupo', $grupogimcana->grupo->id)->count();
                            @endphp
                            @if ($usuariosgrupos->where('id_grupo', $grupogimcana->grupo->id)->count() !== $grupogimcana->grupo->capacidad_grupo)
                                <form action="{{ route('unirseGrupo', ['id' => $grupogimcana->grupo->id]) }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="id_gimcana" value="{{ $grupogimcana->grupo->id }}">
                                    <button type="submit" class="grupogimcana">
                                        <h4>{{ $grupogimcana->grupo->nombre_grupo }}</h4>
                                        <h5>{{ $contador }}/{{ $grupogimcana->grupo->capacidad_grupo }} <i
                                                class="fa-solid fa-people-group fa-sm"></i></h5>
                                    </button>
                                </form>
                            @else
                                <div class="grupogimcanaLleno">
                                    <h4>{{ $grupogimcana->grupo->nombre_grupo }}</h4>
                                    <p>Grupo lleno</p>
                                    <h5>{{ $contador }}/{{ $grupogimcana->grupo->capacidad_grupo }} <i
                                            class="fa-solid fa-people-group fa-sm"></i></h5>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endforeach

                <a href="{{ route('creargrupo', ['idGimcana' => $id]) }}">
                    <div class="creargupogimcana"><i class="fa-solid fa-plus"></i></div>
                </a>
            @else
                <h2>Ya estás en un grupo</h2>
                <a href="{{ route('grupoespera') }}">
                    <button class="botonPaginaEspera">Pagina de espera</button>
                </a>
            @endif
        @endif


    </div>

@endsection
