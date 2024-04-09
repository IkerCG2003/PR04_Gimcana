@extends('layouts.plantilla2')
@section('title', 'Admin')
@section('content')

    <div class="administrador">
        <h1>Gimcanas</h1>
        @foreach ($gimcanas as $gimcana)
            <div class="objetoAdmin">
                <div class="objetoTopAdmin">
                    <h2>{{ $gimcana->nombre_gimcana }}</h2>
                    <h5>{{ $gimcana->id }}</h5>
                </div>
                <h6>{{ $gimcana->descripcion_gimcana }}</h6>
                {{-- <p>{{ $gimcana->created_at }}</p>
                <p>{{ $gimcana->updated_at }}</p> --}}
                <div class="botones">
                    <a href="{{ route('admin.editar', $gimcana->id) }}"><button class="editarcrud"><i
                                class="fa-solid fa-pen-to-square"></i></button></a>
                    <button class="eliminarcrud" type="button"
                        onclick="eliminar('{{ $gimcana->id }}','{{ $gimcana->nombre_gimcana }}')"><i
                            class="fa-solid fa-trash"></i></button>
                    <button class="iniciarGimcana" type="button">Iniciar</button>
                </div>
            </div>
        @endforeach
        <br><br>
        <h1>Sitios</h1>
        @foreach ($sitios as $sitio)
            <div class="objetoAdmin">
                <div class="objetoTopAdmin">
                    <h2>{{ $sitio->nom_sitio }}</h2>
                    <h5>{{ $sitio->id }}</h5>
                </div>
                <div class="objetoBotAdmin">
                    <div>
                        <h6>Lat: {{ $sitio->latitud }}</h6>
                        <h6>Long: {{ $sitio->longitud }}</h6>
                    </div>
                    <img src="/src/{{ $sitio->ico_sitio }}.png" alt="">
                </div>
                <div class="etiquetasSitiosAdmin">
                    @foreach ($etiquetassitios as $etiquetasitio)
                        @if ($sitio->id === $etiquetasitio->id_sitio)
                            <p>{{ $etiquetasitio->etiquetaRel->nom_etiqueta }}</p>
                        @endif
                    @endforeach
                </div>
                <div class="botones">
                    <a href="{{ route('admin.editar', $gimcana->id) }}"><button class="editarcrud"><i
                                class="fa-solid fa-pen-to-square"></i></button></a>
                    <button class="eliminarcrud" type="button"
                        onclick="eliminar('{{ $gimcana->id }}','{{ $gimcana->nombre_gimcana }}')"><i
                            class="fa-solid fa-trash"></i></button>
                </div>
            </div>
        @endforeach
        <br><br>
        <h1>Pruebas</h1>
        @foreach ($pruebas as $prueba)
            <div class="objetoAdmin">
                <h4>{{ $prueba->nom_prueba }}</h4>
                <h5>{{ $prueba->pista_prueba }}</h5>
                <div class="botones">
                    <a href="{{ route('admin.editar', $gimcana->id) }}"><button class="editarcrud"><i
                                class="fa-solid fa-pen-to-square"></i></button></a>
                    <button class="eliminarcrud" type="button"
                        onclick="eliminar('{{ $gimcana->id }}','{{ $gimcana->nombre_gimcana }}')"><i
                            class="fa-solid fa-trash"></i></button>
                </div>
            </div>
        @endforeach
    </div>
@endsection





@section('script')
    <script>
        function ListarProductos() {
            var resultado = document.getElementById('tablaUsuariosBody');
            var formdata = new FormData();
            var ajax = new XMLHttpRequest();
            ajax.open('POST', '/acciones/listar.php');
            ajax.onload = function() {
                var str = "";
                if (ajax.status == 200) {
                    var json = JSON.parse(ajax.responseText);
                    var tabla = '';
                    json.forEach(function(gimcana) {
                        var str = "<tr><td class='fila1'>" + gimcana.id + "</td>";
                        str += "<td>" + gimcana.nombre_gimcana + "</td>";
                        str += "<td class='scroll'>" + gimcana.descripcion + "</td>";
                        str += "<td>" + gimcana.created_at + "</td>";
                        str += "<td class='fila2'>" + gimcana.updated_at + "</td>";
                        str += "<td class='nofondo'>";
                        str += "<a href='/admin/" + gimcana.id +
                            "'><button class='editarcrud'>Editar</button></a>";
                        str += "<button type='button' onclick=\"eliminar('" + gimcana.id + "', '" + gimcana
                            .nombre_gimcana + "')\" class='eliminarcrud'>Eliminar</button>";
                        str += "</td>";
                        str += "</tr>";
                        tabla += str;
                    });
                    resultado.innerHTML = tabla;
                } else {
                    resultado.innerText = 'Error';
                }
            }
            ajax.send(formdata);
        }

        // Eliminar

        function eliminar(id, nombre_gimcana) {
            Swal.fire({
                title: '¿Está seguro de eliminar ' + nombre_gimcana + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí',
                cancelButtonText: 'NO'
            }).then((value) => {
                if (value.isConfirmed) {
                    var formdata = new FormData();
                    formdata.append('id', id);
                    var ajax = new XMLHttpRequest();
                    ajax.open('POST', '/acciones/eliminar.php');
                    ajax.onload = function() {
                        if (ajax.status === 200) {
                            if (ajax.responseText === "ok") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Eliminado',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {});
                            }
                        }
                        ListarProductos();
                    };
                    ajax.send(formdata);
                }
            });
        }
    </script>
@endsection
