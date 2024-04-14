@extends('layouts.plantilla_admin')
@section('title', 'Admin')
@section('content')

    <div class="administrador">

        <table>
            <thead>
                <tr>
                    <th class="fila1">Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Coreo</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Modificación</th>
                    <th class="fila2">Modificación</th>
                    <th class="nofondo"><a href="{{ route('agregarUsuario') }}"><button class="agregarcrud">Agregar</button></a>
                    </th>
                </tr>
            </thead>
            <tbody id="resultado">
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
        ajax.open('POST', '/listarUsuario');
        ajax.onload = function () {
            var str = "";
            if (ajax.status == 200) {
                var json = JSON.parse(ajax.responseText);
                var tabla = '';
                json.forEach(function (item) {
                    str = "<tr><td>" + item.id + "</td>";
                    str = str + "<td>" + item.nom_usuario + "</td>";
                    str += "<td>" + item.apell_usuario + "</td>";
                    str += "<td>" + item.email_usuario + "</td>";
                    str += "<td>" + item.pwd_usuario + "</td>";
                    str += "<td>" + item.rol_usuario + "</td>";
                    str += "<td>" + item.created_at + "</td>";
                    str += "<td>" + item.updated_at + "</td>";                    
                    str += "<td>";
                    str += "<a href='/admin/usuario/editar/" + item.id + "'><button class='editarcrud'>Editar</button></a>";
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

        // Eliminar

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
                    ajax.open('POST', '/eliminarUsuario');
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
    </script>
@endsection
