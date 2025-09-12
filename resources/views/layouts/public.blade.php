<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ciclismo')</title>

    {{-- CSS principal --}}
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @stack('styles')
</head>
<body>
    <div class="background-aurora"></div>

    {{-- Header público --}}
    @include('layouts.public-header')

    <main>
        @yield('content')
    </main>

    {{-- Footer público --}}
    @include('layouts.public-footer')

    @stack('scripts')
</body>
</html>