    @extends('layouts.plantilla_admin')
    @section('title', 'Editar: ' . $grupo->nombre_grupo)
    @section('content')

        <div class="editar">
            <br><br>
            <form action="{{route('adminGrupo.updateGrupo',$grupo)}}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="idp" id="idp" value="{{ $grupo->id }}" readonly>
                <label for="numero_grupo">Número del grupo:</label>
                <input type="number" id="numero_grupo" name="numero_grupo" value="{{ $grupo->numero_grupo }}">
                <label for="nombre_grupo">Nombre del grupo:</label>
                <input type="text" id="nombre_grupo" name="nombre_grupo" value="{{ $grupo->nombre_grupo }}">
                <label for="capacidad_grupo">Capacidad del grupo:</label>
                <input type="number" id="capacidad_grupo" name="capacidad_grupo" value="{{ $grupo->capacidad_grupo }}">
                <label for="id_usuario">Creador del grupo:</label>
                <input type="text" id="id_usuario" name="id_usuario" value="{{ $grupo->id_usuario  }}">
                <button type="submit" class="editarbtn">Actualizar formulario</button>
            </form>
        </div>
    @endsection