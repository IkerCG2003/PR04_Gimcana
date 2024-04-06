@if (session('nombre') && session('apellido') && session('email') && session('rol'))

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="{{ asset('/src/location-dot-solid(1).svg') }}" type="image/x-icon">
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="https://kit.fontawesome.com/8e6d3dccce.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>

        <header>

            <nav class="navbar bg-body-tertiary fixed-top">
                <div class="container-fluid">
                    <a href="{{ route('mapa') }}"><img class="navbar-brand"
                            src="{{ asset('/src/LOGO_NEGRO.png') }}"></a>
                    <a href="{{ route('mapa') }}">
                        <h4>GeoMap</h4>
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation">
                        <span class="toggler-icon top-bar"></span>
                        <span class="toggler-icon middle-bar"></span>
                        <span class="toggler-icon bottom-bar"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">GeoMap</h5>
                            <button class="navbar-toggler cerrar" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                                aria-label="Toggle navigation">
                                <span class="toggler-icon top-bar"></span>
                                <span class="toggler-icon middle-bar"></span>
                                <span class="toggler-icon bottom-bar"></span>
                            </button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                @if (session('rol') === 0)
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href=""><i
                                                class="fa-solid fa-lock"></i> Admin</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('mapa') }}"><i
                                            class="fa-solid fa-map"></i> Mapa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#"><i
                                            class="fa-solid fa-user"></i> {{ session('nombre') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('favoritos') }}"><i
                                            class="fa-solid fa-star"></i> Favoritos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page"
                                        href="{{ route('todasgimcanas') }}"><i class="fa-solid fa-location-dot"></i>
                                        Gimcanas</a>
                                </li>
                                {{-- @foreach ($gimcanas as $gimcana)
                                    <a href="{{ route('menugimcana', $gimcana->id) }}">
                                        <p>{{ $gimcana->nombre_gimcana }}</p>
                                    </a>
                                @endforeach --}}
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <li class="nav-item">
                                        <i class="fa-solid fa-right-from-bracket"></i> <button
                                            type="submit">Logout</button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

        </header>

        @yield('content')

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script src="{{ asset('/js/script.js') }}"></script>

    </body>

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
