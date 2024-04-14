    @extends('layouts.plantilla_admin')
    @section('title', 'Editar: ' . $sitio->nom_sitio)
    @section('content')

        <div class="editar">
            <br><br>
            <form action="{{route('adminSitio.updateSitio',$sitio)}}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="idp" id="idp" value="{{ $sitio->id }}" readonly>
                <label for="nom_sitio">Nombre del sitio:</label>
                <input type="text" id="nom_sitio" name="nom_sitio" value="{{ $sitio->nom_sitio }}">
                <label for="ubi_sitio">Ubicación del sitio:</label>
                <input type="text" id="ubi_sitio" name="ubi_sitio" value="{{ $sitio->ubi_sitio }}">
                <label for="ico_sitio">Icono del sitio:</label>
                <input type="text" id="ico_sitio" name="ico_sitio" value="{{ $sitio->ico_sitio  }}">
                <button type="submit" class="editarbtn">Actualizar formulario</button>
            </form>
        </div>
    @endsection