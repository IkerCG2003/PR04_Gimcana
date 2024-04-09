@extends('layouts/plantilla2')
@section('title', 'Gimcanas')
@section('content')

    @foreach ($gruposgimcanas as $grupogimcana)
    @endforeach
    @foreach ($gimcanas as $gimcana)
    @endforeach
    @foreach ($usuariosgrupos as $usuariogrupo)
    @endforeach

    <div class="todasgimcanas">
        @if ($usuariosgrupos->isEmpty())
            <h2><i class="fa-solid fa-location-dot"></i> Gimcanas</h2>
            @foreach ($gimcanas as $gimcana)
                <a href="{{ route('menugimcana', $gimcana->id) }}">
                    <div class="gimcanas">
                        <div class="izqGimcanas">
                            <h4>{{ $gimcana->nombre_gimcana }}</h4>
                            <p>{{ $gimcana->descripcion_gimcana }}</p>
                        </div>
                        <div class="derGimcanas">
                            @php
                                $contador = 0;
                            @endphp
                            @foreach ($gruposgimcanas as $grupogimcana)
                                @if ($grupogimcana->gimcana->id === $gimcana->id)
                                    @php
                                        $contador++;
                                    @endphp
                                @endif
                            @endforeach
                            <div class="contadorGrupos">
                                <h6><i class="fa-solid fa-people-group"></i> {{ $contador }}</h6>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            @if ($usuariogrupo->id_usuario !== session('id'))
                <h2><i class="fa-solid fa-location-dot"></i> Gimcanas</h2>
                @foreach ($gimcanas as $gimcana)
                    <a href="{{ route('menugimcana', $gimcana->id) }}">
                        <div class="gimcanas">
                            <div class="izqGimcanas">
                                <h4>{{ $gimcana->nombre_gimcana }}</h4>
                                <p>{{ $gimcana->descripcion_gimcana }}</p>
                            </div>
                            <div class="derGimcanas">
                                @php
                                    $contador = 0;
                                @endphp
                                @foreach ($gruposgimcanas as $grupogimcana)
                                    @if ($grupogimcana->gimcana->id === $gimcana->id)
                                        @php
                                            $contador++;
                                        @endphp
                                    @endif
                                @endforeach
                                <div class="contadorGrupos">
                                    <h6><i class="fa-solid fa-people-group"></i> {{ $contador }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <h2>Ya estás en un grupo</h2>
                <a href="{{ route('grupoespera') }}">
                    <button class="botonPaginaEspera">Pagina de espera</button>
                </a>
            @endif
        @endif
    </div>

@endsection
