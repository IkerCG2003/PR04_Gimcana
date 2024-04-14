    @extends('layouts.plantilla_admin')
    @section('title', 'Editar: ' . $pruebassitios->id_prueba)
    @section('content')

        <div class="editar">
            <br><br>
            <form action="{{route('adminPruebaSitio.updatePruebaSitio', $pruebassitios)}}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="idp" id="idp" value="{{ $pruebassitios->id }}" readonly>
                <label for="id_prueba">Id de la prueba:</label>
                <input type="number" id="id_prueba" name="id_prueba" value="{{ $pruebassitios->id_prueba }}">
                <label for="id_sitio">Id del sitio:</label>
                <input type="number" id="id_sitio" name="id_sitio" value="{{ $pruebassitios->id_sitio }}">
                <button type="submit" class="editarbtn">Actualizar formulario</button>
            </form>
        </div>
    @endsection