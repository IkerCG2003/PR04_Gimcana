    @extends('layouts.plantilla_admin')
    @section('title', 'Editar: ' . $etiqueta->nom_etiqueta)
    @section('content')

        <div class="editar">
            <br><br>
            <form action="{{route('adminEtiqueta.updateEtiqueta',$etiqueta)}}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="idp" id="idp" value="{{ $etiqueta->id }}" readonly>
                <label for="nom_etiqueta">Nombre de la etiqueta:</label>
                <input type="text" id="nom_etiqueta" name="nom_etiqueta" value="{{ $etiqueta->nom_etiqueta }}">
                <button type="submit" class="editarbtn">Actualizar formulario</button>
            </form>
        </div>
    @endsection