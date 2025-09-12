<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard de Usuario')</title>
    <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
</head>
<body>

    {{-- Header específico de usuario --}}
    @include('partials.user-header')

    {{-- Contenido principal --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer (reutiliza tu public-footer) --}}
    @include('partials.user-footer')

</body>
</html>
