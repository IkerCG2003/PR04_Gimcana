@extends('layouts/plantilla2')
@section('title', 'Gimcanas')
@section('content')

    @foreach ($gruposgimcanas as $grupogimcana)
    @endforeach
    @foreach ($gimcanas as $gimcana)
    @endforeach

    <div class="todasgimcanas">
        {{-- @foreach ($gruposgimcanas as $grupogimcana)
            <div class="grupogimcana">
                <h6> {{ $grupogimcana->grupo->numero_grupo }}</h6>
                <h4> {{ $grupogimcana->grupo->nombre_grupo }}</h4>
                <h5><i class="fa-solid fa-people-group fa-sm"></i> 1/{{ $grupogimcana->grupo->capacidad_grupo }}</h5>
            </div>
        @endforeach --}}
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
    </div>

@endsection
