{{-- resources/views/auth/login.blade.php --}}

@extends('layouts.public')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/inicio_sesion.css') }}">
@endpush

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Ingresa tu correo"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Ingresa tu contraseña"
                    required
                >
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button type="submit" class="login-button">Iniciar Sesión</button>
                <p class="register-link">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}">Regístrate aquí</a>
                </p>
            </div>
        </form>
    </div>
@endsection
