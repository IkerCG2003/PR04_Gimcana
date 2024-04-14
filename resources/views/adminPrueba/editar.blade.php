    @extends('layouts.plantilla_admin')
    @section('title', 'Editar: ' . $prueba->nom_prueba)
    @section('content')

        <div class="editar">
            <br><br>
            <form action="{{route('adminPrueba.updatePrueba',$prueba)}}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="idp" id="idp" value="{{ $prueba->id }}" readonly>
                <label for="nom_prueba">Nombre de la prueba:</label>
                <input type="text" id="nom_prueba" name="nom_prueba" value="{{ $prueba->nom_prueba }}">
                <label for="pista_prueba">Pista:</label>
                <input type="text" id="pista_prueba" name="pista_prueba" value="{{ $prueba->pista_prueba }}">
                <label for="estado_prueba">Estado:</label>
                <input type="number" id="estado_prueba" name="estado_prueba" value="{{ $prueba->estado_prueba  }}">
                <button type="submit" class="editarbtn">Actualizar formulario</button>
            </form>
        </div>
    @endsection