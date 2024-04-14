    @extends('layouts.plantilla_admin')
    @section('title', 'Editar: ' . $gimcana->nombre_gimcana)
    @section('content')

        <div class="editar">
            {{-- <a href="{{ route('admin.admin') }}"><i class="atras fa-solid fa-arrow-left fa-xl"></i></a> --}}
            <br><br>
            <form action="{{route('admin.update',$gimcana)}}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="idp" id="idp" value="{{ $gimcana->id }}" readonly>
                <label for="nombre_gimcana">Nombre de la Gimcana:</label>
                <input type="text" id="nombre_gimcana" name="nombre_gimcana" value="{{ $gimcana->nombre_gimcana }}">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" class="scrolleditar">{{ $gimcana->descripcion_gimcana }}</textarea>
                <button type="submit" class="editarbtn">Actualizar formulario</button>
            </form>
        </div>
    @endsection