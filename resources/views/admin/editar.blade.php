    @extends('layouts.plantilla_admin')
    @section('title', 'Editar: ' . $gimcana->nombre_gimcana)
    @section('content')

        <div class="editar">
            {{-- <a href="{{ route('admin.admin') }}"><i class="atras fa-solid fa-arrow-left fa-xl"></i></a> --}}
            <br><br>
            <form class="formEditarGimcana" action="" method="post" id="frm">
                <input type="text" name="idp" id="idp" value="{{ $gimcana->id }}" readonly>
                <label for="nombre_gimcana">Nombre de la Gimcana:</label>
                <input type="text" id="nombre_gimcana" name="nombre_gimcana"
                    value="{{ $gimcana->nombre_gimcana }}">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" class="scrolleditar">{{ $gimcana->descripcion_gimcana }}</textarea>
                <input class="editarbtn" type="button" value="Editar gimcana" id="Editar">
            </form>
        </div>
    @endsection

    @section('script')
        <script>
                // EDITAR
                Editar.addEventListener("click", () => {
                    var form = document.getElementById('frm');
                    var formdata = new FormData(form);
                    var ajax = new XMLHttpRequest();
                    ajax.open('POST', '/acciones/editar.php');
                    ajax.onload = function() {
                        if (ajax.status === 200) {
                            console.log(ajax.responseText);
                            if (ajax.responseText == "ok") {
                                window.location.replace("./admin");
                            }
                        } else {
                            respuesta_ajax.innerText = 'Error';
                        }
                    }
                    ajax.send(formdata);
                });
        </script>
    @endsection
