{{-- resources/views/mostrar_equipo.blade.php --}}
@extends('layouts.user')

@section('title', 'Ver Equipo')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/mostrar_equipo.css') }}">
@endpush

@section('content')
    {{-- Capa de fondo animado --}}
    <div class="background-aurora"></div>

    <div id="contenido">
        <div class="registro-container">
            <h1>Ver equipo</h1>

            {{-- Errores de validación --}}
            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="registro-container" action="{{ route('equipos.show') }}" method="POST">
                @csrf

                <div class="input-group">
                    <label for="email">Correo Manager</label>
                    <input type="email" id="email" name="email" placeholder="Ingrese el correo"
                        value="{{ old('email') }}" required>
                </div>

                <div class="input-group">
                    <label for="equipo">Equipo Ciclista</label>
                    <input type="text" id="equipo" name="equipo" placeholder="Ingresa el equipo"
                        value="{{ old('equipo') }}" required>
                </div>

                <button type="submit" class="registro-button">
                    Ver ciclistas
                </button>
            </form>
        </div>
    </div>

    {{-- Listado de ciclistas --}}
    @isset($ciclistas)
        <div class="equipo">
            <h1 class="titulos-decorados">SU EQUIPO:</h1>
            <ul>
                @foreach ($ciclistas as $c)
                    <li>
                        <div class="nombre">
                            {{ $c->nombres }} {{ $c->apellidos }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endisset
@endsection
