@extends('layouts.admin')

@section('title', 'Panel de Administración')

@section('content')
  {{-- Aquí va el contenido original de admin.php --}}
  <h2>Bienvenido, {{ $user->email }}</h2>
  {{-- … resto de tu HTML … --}}
@endsection
