<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin Dashboard')</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

  @include('partials.admin-header')

  <main>
    @yield('content')
  </main>

  @include('partials.admin-footer')
</body>
</html>
