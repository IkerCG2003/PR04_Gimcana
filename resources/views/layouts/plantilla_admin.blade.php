@if (session('nombre') && session('apellido') && session('email') && session('rol'))

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="/src/logos/LOGO3.png" type="image/x-icon">
        <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
            rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
        <script src="https://kit.fontawesome.com/8e6d3dccce.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    {{-- <a href="{{ route('vistas.todo') }}"><img src="/src/logos/LOGO2.png"></a> --}}

                    <div>
                        <a class="nav-link" href="{{ route('admin') }}" role="button">
                            <p class="tipoRestaurantes"></i>Usuarios</p>
                        </a>
                        <a class="nav-link" href="{{ route('admin') }}" role="button">
                            <p class="tipoRestaurantes"></i>Usuarios</p>
                        </a>
                        <a class="nav-link" href="{{ route('admin') }}" role="button">
                            <p class="tipoRestaurantes"></i>Usuarios</p>
                        </a>
                        <a class="nav-link" href="{{ route('admin') }}" role="button">
                            <p class="tipoRestaurantes"></i>Usuarios</p>
                        </a>
                        <a class="nav-link" href="{{ route('admin') }}" role="button">
                            <p class="tipoRestaurantes"></i>Usuarios</p>
                        </a>
                        <a class="nav-link" href="{{ route('admin') }}" role="button">
                            <p class="tipoRestaurantes"></i>Usuarios</p>
                        </a>

                        
                    </div>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}">
                            <p class="tipoRestaurantes"><i class="fa-solid fa-right-from-bracket"></i> Logout</p>
                        </a>
                    </form>
                </div>
            </nav>
        </header>

        @yield('content')

    </body>


    @yield('script')


    </html>

@else
    {{-- Establecer el mensaje de error --}}
    @php
        session()->flash('error', 'Debes iniciar sesión para acceder a esta página');
    @endphp

    {{-- Redireccionar al usuario a la página de inicio de sesión --}}
    <script>
        window.location = "{{ route('login') }}";
    </script>
@endif