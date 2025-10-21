@extends('layouts.user')

@section('title', 'Actualizar Ciclista')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/update.css') }}">
@endpush

@section('content')
    <div class="background-aurora"></div>

    <div id="contenido">
        <div class="registro-container">
            <h1>Formulario de Actualizacion</h1>

            @if (session('message'))
                <div class="alert">{{ session('message') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="actualizar-ciclista" action="{{ route('ciclistas.update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Campo para indicar el id del ciclista a actualizar --}}
                <div class="input-group">
                    <label for="id">ID del Ciclista</label>
                    <input type="number" id="id" name="id" value="{{ old('id') }}"
                        placeholder="Ingresa el id del ciclista" required>
                </div>

                <div class="input-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" id="nombres" name="nombres" value="{{ old('nombres') }}"
                        placeholder="Ingresa los nombres" required>
                </div>

                <div class="input-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}"
                        placeholder="Ingresa los apellidos" required>
                </div>

                <div class="input-group">
                    <label for="correo">Correo Ciclista</label>
                    <input type="email" id="correo" name="correo" value="{{ old('correo') }}"
                        placeholder="Ingresa el correo" required>
                </div>

                <div class="input-group">
                    <label for="equipo">Equipo Ciclista</label>
                    <input type="text" id="equipo" name="equipo" value="{{ old('equipo') }}"
                        placeholder="Ingresa el equipo" required>
                </div>

                <div class="input-group">
                    <label for="telefono">Telefono Contacto</label>
                    <input type="number" id="telefono" name="telefono" value="{{ old('telefono') }}"
                        placeholder="Ingresa telefono contacto" required>
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
                        @foreach (['Alemania', 'Argentina', 'Belgica', 'Brasil', 'Bolivia', 'Canada', 'China', 'Chile', 'Colombia', 'Croacia', 'Ecuador', 'Estados Unidos', 'Espana', 'Francia', 'Italia', 'Mexico', 'Paraguay', 'Peru', 'Rusia', 'Uruguay', 'Venezuela'] as $pais)
                            <option value="{{ $pais }}" {{ old('pais_origen') == $pais ? 'selected' : '' }}>
                                {{ $pais }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <label for="referencia_cicla">Referencia de la Cicla</label>
                    <input type="text" id="referencia_cicla" name="referencia_cicla"
                        value="{{ old('referencia_cicla') }}" placeholder="Ingresa la referencia de la cicla" required>
                </div>

                <div class="input-group">
                    <label for="tipo_carrera">Tipo de Carrera</label>
                    <select id="tipo_carrera" name="tipo_carrera" required>
                        @foreach (['camino', 'ciclocross', 'montana', 'pavimento'] as $tipo)
                            <option value="{{ $tipo }}" {{ old('tipo_carrera') == $tipo ? 'selected' : '' }}>
                                {{ ucfirst($tipo) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <label for="nombre_carrera">Nombre de la Carrera</label>
                    <input type="text" id="nombre_carrera" name="nombre_carrera" value="{{ old('nombre_carrera') }}"
                        placeholder="Ingresa el nombre de la carrera" required>
                </div>

                <div class="input-group">
                    <label for="pais_carrera">País de la Carrera</label>
                    <select id="pais_carrera" name="pais_carrera" required>
                        @foreach (['Alemania', 'Argentina', 'Belgica', 'Brasil', 'Bolivia', 'Canada', 'China', 'Chile', 'Colombia', 'Croacia', 'Ecuador', 'Estados Unidos', 'Espana', 'Francia', 'Italia', 'Mexico', 'Paraguay', 'Peru', 'Rusia', 'Uruguay', 'Venezuela'] as $pais)
                            <option value="{{ $pais }}" {{ old('pais_carrera') == $pais ? 'selected' : '' }}>
                                {{ $pais }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <label for="imagen_ciclista">Imagen del ciclista</label>
                    <input type="file" id="imagen_ciclista" name="imagen_ciclista">
                </div>

                <button type="submit" class="registro-button" name="actualizar-ciclista">Actualizar Ciclista</button>
            </form>
        </div>
    </div>
@endsection
