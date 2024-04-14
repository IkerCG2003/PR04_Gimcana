    @extends('layouts.plantilla_admin')
    @section('title', 'Editar: ' . $usuario->nombre_gimcana)
    @section('content')

        <div class="editar">
            {{-- <a href="{{ route('admin.admin') }}"><i class="atras fa-solid fa-arrow-left fa-xl"></i></a> --}}
            <br><br>
            <form action="{{route('admin.updateUsuario',$usuario)}}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="idp" id="idp" value="{{ $usuario->id }}" readonly>
                <label for="nom_usuario">Nombre del usuario:</label>
                <input type="text" id="nom_usuario" name="nom_usuario" value="{{ $usuario->nom_usuario }}">
                <label for="apell_usuario">Apellido usuario:</label>
                <input type="text" id="apell_usuario" name="apell_usuario" value="{{ $usuario->apell_usuario }}">
                <label for="email_usuario">Correo usuario:</label>
                <input type="email" id="email_usuario" name="email_usuario" value="{{ $usuario->email_usuario }}">
                <label for="pwd_usuario">Contraseña usuario:</label>
                <input type="password" id="pwd_usuario" name="pwd_usuario" value="{{ $usuario->pwd_usuario }}">
                <label for="rol_usuario">Rol usuario:</label>
                <input type="number" id="rol_usuario" name="rol_usuario" value="{{ $usuario->rol_usuario }}">
                <button type="submit" class="editarbtn">Actualizar formulario</button>
            </form>
        </div>
    @endsection