@extends('layouts.plantilla')
@section('title', 'Admin')
@section('content')

    <div class="administrador">

        <table>
            <thead>
                <tr>
                    <th class="fila1">Id</th>
                    <th>Nombre&nbsp;Restaurante</th>
                    <th>Descripción</th>
                    <th>Localización</th>
                    <th>Contacto</th>
                    <th>Precio&nbsp;Menú</th>
                    <th>Tipo&nbsp;Comida</th>
                    <th>Chef</th>
                    {{-- <th>Estado</th> --}}
                    <th>Creación</th>
                    <th class="fila2">Modificación</th>
                    <th class="nofondo"><a href="{{ route('admin.agregar') }}"><button class="agregarcrud">Agregar</button></a>
                    </th>
                </tr>
            </thead>
            <tbody id="tablaUsuariosBody">
                @foreach ($restaurantes as $restaurante)
                    <tr>
                        <td class="fila1">{{ $restaurante->id }}</td>
                        <td>{{ $restaurante->nombre_restaurante }}</td>
                        <td class="scroll">{{ $restaurante->descripcion }}</td>
                        <td>{{ $restaurante->localizacion }}</td>
                        <td>{{ $restaurante->contacto }}</td>
                        <td>{{ $restaurante->precio_menu }}</td>
                        <td>{{ $restaurante->tipo_comida }}</td>
                        <td>{{ $restaurante->chef }}</td>
                        {{-- <td>{{ $restaurante->estado ? 'Activado' : 'Desactivado' }}</td> --}}
                        <td>{{ $restaurante->created_at }}</td>
                        <td class="fila2">{{ $restaurante->updated_at }}</td>
                        <td class="nofondo">
                            <a href="{{ route('admin.editar', $restaurante->id) }}"><button
                                    class="editarcrud">Editar</button></a>
                            <button class="eliminarcrud" type="button"
                                onclick="eliminar('{{ $restaurante->id }}','{{ $restaurante->nombre_restaurante }}')">Eliminar</button>
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
                    json.forEach(function(restaurante) {
                        var str = "<tr><td class='fila1'>" + restaurante.id + "</td>";
                        str += "<td>" + restaurante.nombre_restaurante + "</td>";
                        str += "<td class='scroll'>" + restaurante.descripcion + "</td>";
                        str += "<td>" + restaurante.localizacion + "</td>";
                        str += "<td>" + restaurante.contacto + "</td>";
                        str += "<td>" + restaurante.precio_menu + "</td>";
                        str += "<td>" + restaurante.tipo_comida + "</td>";
                        str += "<td>" + restaurante.chef + "</td>";
                        // str += "<td>" + (restaurante.estado ? 'Activado' : 'Desactivado') + "</td>";
                        str += "<td>" + restaurante.created_at + "</td>";
                        str += "<td class='fila2'>" + restaurante.updated_at + "</td>";
                        str += "<td class='nofondo'>";
                        str += "<a href='/admin/" + restaurante.id +
                            "'><button class='editarcrud'>Editar</button></a>";
                        str += "<button type='button' onclick=\"eliminar('" + restaurante.id + "', '" +
                            restaurante.nombre_restaurante + "')\" class='eliminarcrud'>Eliminar</button>";
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

        function eliminar(id, nombre_restaurante) {
            Swal.fire({
                title: '¿Está seguro de eliminar ' + nombre_restaurante + '?',
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
