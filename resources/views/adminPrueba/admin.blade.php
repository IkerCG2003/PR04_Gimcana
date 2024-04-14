@extends('layouts.plantilla_admin')
@section('title', 'Admin')
@section('content')

    <div class="administrador">
        <table>
            <thead>
                <tr>
                    <th class="fila1">Id</th>
                    <th>Nombre</th>
                    <th>Pista</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Modificación</th>
                    <th class="fila2">Modificación</th>
                    <th class="nofondo"><a href="{{ route('agregarPrueba') }}"><button class="agregarcrud">Agregar</button></a>
                    </th>
                </tr>
            </thead>
            <tbody id="resultado">
            </tbody>
        </table>
    </div>

    <div class="administrador">
        <table>
            <thead>
                <tr>
                    <th class="fila1">Id</th>
                    <th>Prueba</th>
                    <th>Sitio</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Modificación</th>
                    <th class="fila2">Modificación</th>
                    <th class="nofondo"><a href="{{ route('agregarPruebaSitio') }}"><button class="agregarcrud">Agregar</button></a>
                    </th>
                </tr>
            </thead>
            <tbody id="resultado2">
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
    ListarProductos('');
    function ListarProductos(valor) {
        var resultado = document.getElementById('resultado');
        var formdata = new FormData();
        var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
        formdata.append('_token', csrfToken);
        var ajax = new XMLHttpRequest();
        ajax.open('POST', '/listarPrueba');
        ajax.onload = function () {
            var str = "";
            if (ajax.status == 200) {
                var json = JSON.parse(ajax.responseText);
                var tabla = '';
                json.forEach(function (item) {
                    str = "<tr><td>" + item.id + "</td>";
                    str = str + "<td>" + item.nom_prueba + "</td>";
                    str += "<td>" + item.pista_prueba + "</td>";
                    str += "<td>" + item.estado_prueba + "</td>";
                    str += "<td>" + item.created_at + "</td>";
                    str += "<td>" + item.updated_at + "</td>";                    
                    str += "<td>";
                    str += "<a href='/admin/prueba/editar/" + item.id + "'><button class='editarcrud'>Editar</button></a>";
                    str += "<button class='eliminarcrud' type='button' onclick='Eliminar(" + item.id + ")'>Eliminar</button>";                    
                    str += "</td> ";
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

    ListarProductos2('');
    function ListarProductos2(valor) {
        var resultado = document.getElementById('resultado2');
        var formdata = new FormData();
        var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
        formdata.append('_token', csrfToken);
        var ajax = new XMLHttpRequest();
        ajax.open('POST', '/listarPruebaSitio');
        ajax.onload = function () {
            var str = "";
            if (ajax.status == 200) {
                var json = JSON.parse(ajax.responseText);
                var tabla = '';
                json.forEach(function (item) {
                    str = "<tr><td>" + item.id + "</td>";
                    str = str + "<td>" + item.id_prueba + "</td>";
                    str += "<td>" + item.id_sitio + "</td>";
                    str += "<td>" + item.created_at + "</td>";
                    str += "<td>" + item.updated_at + "</td>";                    
                    str += "<td>";
                    str += "<a href='/admin/pruebasitio/editar/" + item.id + "'><button class='editarcrud'>Editar</button></a>";
                    str += "<button class='eliminarcrud' type='button' onclick='Eliminar2(" + item.id + ")'>Eliminar</button>";                    
                    str += "</td> ";
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

        // Eliminar grupo

        function Eliminar(id) {
            Swal.fire({
                title: 'Esta seguro de eliminar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!',
                cancelButtonText: 'NO'
            }).then((result) => {
                if (result.isConfirmed) {
                    var formdata = new FormData();
                    var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
                    formdata.append('_token', csrfToken);
                    formdata.append('id', id);
                    debugger;
                    var ajax = new XMLHttpRequest();
                    ajax.open('POST', '/eliminarPrueba');
                    ajax.onload = function () {
                        // console.log(ajax.responseText);
                        // console.log(ajax.open);
                        // console.log(ajax.status);
                    if (ajax.status === 200) {
                        console.log(ajax.responseText);
                        // console.log(ajax.open);
                        console.log(ajax.status);
                        if (ajax.responseText == "ok") {
                            console.log(ajax.responseText);
                            ListarProductos('');
                            Swal.fire({
                                icon: 'success',
                                title: 'Eliminado',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                }
                ajax.send(formdata);
            }
        })
        }

        // Eliminar grupo-gimcana

        function Eliminar2(id) {
            Swal.fire({
                title: 'Esta seguro de eliminar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!',
                cancelButtonText: 'NO'
            }).then((result) => {
                if (result.isConfirmed) {
                    var formdata = new FormData();
                    var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
                    formdata.append('_token', csrfToken);
                    formdata.append('id', id);
                    debugger;
                    var ajax = new XMLHttpRequest();
                    ajax.open('POST', '/eliminarPruebaSitio');
                    ajax.onload = function () {
                        // console.log(ajax.responseText);
                        // console.log(ajax.open);
                        // console.log(ajax.status);
                    if (ajax.status === 200) {
                        console.log(ajax.responseText);
                        // console.log(ajax.open);
                        console.log(ajax.status);
                        if (ajax.responseText == "ok") {
                            console.log(ajax.responseText);
                            ListarProductos2('');
                            Swal.fire({
                                icon: 'success',
                                title: 'Eliminado',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                }
                ajax.send(formdata);
            }
        })
        }
    </script>
@endsection
