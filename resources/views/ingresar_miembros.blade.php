@extends('layouts.user')

@section('title', 'Registro de Ciclistas')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/ingresar_miembros.css') }}">
@endpush

@section('content')
    {{-- Fondo aurora animado --}}
    <div class="background-aurora"></div>

    <div id="contenido">
        <div class="registro-container">
            <h1>Formulario de Registro</h1>

            {{-- Mostrar errores --}}
            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ciclistas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="input-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" id="nombres" name="nombres" placeholder="Ingresa los nombres"
                        value="{{ old('nombres') }}" required>
                </div>

                <div class="input-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa los apellidos"
                        value="{{ old('apellidos') }}" required>
                </div>

                <div class="input-group">
                    <label for="correo">Correo Ciclista</label>
                    <input type="email" id="correo" name="correo" placeholder="Ingresa el correo"
                        value="{{ old('correo') }}" required>
                </div>

                <div class="input-group">
                    <label for="equipo">Equipo Ciclista</label>
                    <input type="text" id="equipo" name="equipo" placeholder="Ingresa el equipo"
                        value="{{ old('equipo') }}" required>
                </div>

                <div class="input-group">
                    <label for="telefono">Teléfono Contacto</label>
                    <input type="text" id="telefono" name="telefono" placeholder="Ingresa teléfono contacto"
                        value="{{ old('telefono') }}" required>
                </div>

                <div class="input-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                        value="{{ old('fecha_nacimiento') }}" required>
                </div>

                <div class="input-group">
                    <label for="pais_origen">País de Origen</label>
                    <select id="pais_origen" name="pais_origen" required>
                        <option value="">Selecciona el país de origen</option>
                        @foreach (['Alemania', 'Argentina', 'Bélgica', 'Brasil', 'Bolivia', 'Canadá', 'China', 'Chile', 'Colombia', 'Croacia', 'Ecuador', 'Estados Unidos', 'España', 'Francia', 'Italia', 'México', 'Paraguay', 'Perú', 'Rusia', 'Uruguay', 'Venezuela'] as $pais)
                            <option value="{{ $pais }}" {{ old('pais_origen') === $pais ? 'selected' : '' }}>
                                {{ $pais }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <label for="referencia_cicla">Referencia de la Cicla</label>
                    <input type="text" id="referencia_cicla" name="referencia_cicla"
                        placeholder="Ingresa la referencia de la cicla" value="{{ old('referencia_cicla') }}" required>
                </div>

                <div class="input-group">
                    <label for="tipo_carrera">Tipo de Carrera</label>
                    <select id="tipo_carrera" name="tipo_carrera" required>
                        <option value="">Selecciona el tipo de carrera</option>
                        @foreach (['camino', 'ciclocross', 'montana', 'pavimento'] as $tipo)
                            <option value="{{ $tipo }}" {{ old('tipo_carrera') === $tipo ? 'selected' : '' }}>
                                {{ ucfirst($tipo) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <label for="nombre_carrera">Nombre de la Carrera</label>
                    <input type="text" id="nombre_carrera" name="nombre_carrera"
                        placeholder="Ingresa el nombre de la carrera" value="{{ old('nombre_carrera') }}" required>
                </div>

                <div class="input-group">
                    <label for="pais_carrera">País de la Carrera</label>
                    <select id="pais_carrera" name="pais_carrera" required>
                        <option value="">Selecciona el país de la carrera</option>
                        @foreach (['Alemania', 'Argentina', 'Bélgica', 'Brasil', 'Bolivia', 'Canadá', 'China', 'Chile', 'Colombia', 'Croacia', 'Ecuador', 'Estados Unidos', 'España', 'Francia', 'Italia', 'México', 'Paraguay', 'Perú', 'Rusia', 'Uruguay', 'Venezuela'] as $pais)
                            <option value="{{ $pais }}" {{ old('pais_carrera') === $pais ? 'selected' : '' }}>
                                {{ $pais }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <label for="imagen">Imagen del ciclista</label>
                    <input type="file" id="imagen" name="imagen" required>
                </div>

                <button type="submit" class="registro-button">
                    Registrar Ciclista
                </button>
            </form>
        </div>
    </div>
@endsection
