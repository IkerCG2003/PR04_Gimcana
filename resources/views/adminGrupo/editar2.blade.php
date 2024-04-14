    @extends('layouts.plantilla_admin')
    @section('title', 'Editar: ' . $gruposgimcanas->id_grupo)
    @section('content')

        <div class="editar">
            <br><br>
            <form action="{{route('adminGrupoGimcana.updateGrupoGimcana', $gruposgimcanas)}}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="idp" id="idp" value="{{ $gruposgimcanas->id }}" readonly>
                <label for="id_grupo">Id del grupo:</label>
                <input type="number" id="id_grupo" name="id_grupo" value="{{ $gruposgimcanas->id_grupo }}">
                <label for="id_gimcana">Id de la gimcana:</label>
                <input type="number" id="id_gimcana" name="id_gimcana" value="{{ $gruposgimcanas->id_gimcana }}">
                <button type="submit" class="editarbtn">Actualizar formulario</button>
            </form>
        </div>
    @endsection