    @extends('layouts.plantilla_admin')
    @section('title', 'Editar: ' . $etiquetassitios->nombre_grupo)
    @section('content')

        <div class="editar">
            <br><br>
            <form action="{{route('adminSitioEtiqueta.updateSitioEtiqueta', $etiquetassitios)}}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="idp" id="idp" value="{{ $etiquetassitios->id }}" readonly>
                <label for="id_etiqueta">Id de la etiqueta:</label>
                <input type="number" id="id_etiqueta" name="id_etiqueta" value="{{ $etiquetassitios->id_etiqueta }}">
                <label for="id_sitio">Id del sitio:</label>
                <input type="number" id="id_sitio" name="id_sitio" value="{{ $etiquetassitios->id_sitio }}">
                <button type="submit" class="editarbtn">Actualizar formulario</button>
            </form>
        </div>
    @endsection