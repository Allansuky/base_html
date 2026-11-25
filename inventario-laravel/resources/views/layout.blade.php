<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo') · Inventario</title>
    <link rel="stylesheet" href="{{ asset('biblioteca.css') }}">
    <script src="{{ asset('biblioteca.js') }}" defer></script>
</head>
<body>
    <header class="barra">
        <div class="ancho cabecera">
            <a class="marca" href="{{ url('/') }}"><span class="logo" aria-hidden="true">I</span> Inventario</a>
            @auth
                <div class="cuenta">
                    <span>{{ auth()->user()->username }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="boton secundario">Cerrar sesión</button>
                    </form>
                </div>
            @endauth
        </div>
    </header>
    <main class="ancho @yield('clase')">
        @yield('contenido')
    </main>
</body>
</html>
