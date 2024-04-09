@extends('layouts.plantilla_admin')
@section('title', 'Admin')
@section('content')

    <div class="administrador">

        <table>
            <thead>
                <tr>
                    <th class="fila1">Id</th>
                    <th>Nombre Gimcana</th>
                    <th>Descripción Gimcana</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Modificación</th>
                    <th class="fila2">Modificación</th>
                    {{-- <th class="nofondo"><a href="{{ route('admin.agregar') }}"><button class="agregarcrud">Agregar</button></a> --}}
                    </th>
                </tr>
            </thead>
            <tbody id="tablaUsuariosBody">
                @foreach ($gimcanas as $gimcana)
                    <tr>
                        <td class="fila1">{{ $gimcana->id }}</td>
                        <td>{{ $gimcana->nombre_gimcana }}</td>
                        <td class="scroll">{{ $gimcana->descripcion_gimcana }}</td>
                        <td>{{ $gimcana->created_at }}</td>
                        <td class="fila2">{{ $gimcana->updated_at }}</td>
                        <td class="nofondo">
                            <a href="{{ route('admin.editar', $gimcana->id) }}"><button class="editarcrud">Editar</button></a>
                            <button class="eliminarcrud" type="button" onclick="eliminar('{{ $gimcana->id }}','{{ $gimcana->nombre_gimcana }}')">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
                        str += "<a href='/admin/" + gimcana.id + "'><button class='editarcrud'>Editar</button></a>";
                        str += "<button type='button' onclick=\"eliminar('" + gimcana.id + "', '" + gimcana.nombre_gimcana + "')\" class='eliminarcrud'>Eliminar</button>";
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
