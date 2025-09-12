{{-- resources/views/contacto.blade.php --}}

@extends('layouts.public')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
@endpush

@section('title', 'Contacto')

@section('content')
    <img
        class="contact-header-img"
        src="{{ asset('assets/contacto.png') }}"
        alt="imagen contacto">


    <div class="contact-container">
        <h1 class="titulos-decorados">Contáctanos</h1>
        <p>Si tienes alguna pregunta o comentario, no dudes en escribirnos.</p>

        <form id="contacto-usuario"
              action="{{ route('contacto.store') }}"
              method="POST"
              style="margin-top: 10px;">
            @csrf

            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text"
                       id="nombre"
                       name="nombre"
                       placeholder="Tu nombre"
                       required>
            </div>

            <div class="input-group">
                <label for="apellido">Apellido:</label>
                <input type="text"
                       id="apellido"
                       name="apellido"
                       placeholder="Tu apellido"
                       required>
            </div>

            <div class="input-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email"
                       id="email"
                       name="email"
                       placeholder="Tu correo electrónico"
                       required>
            </div>

            <div class="input-group">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje"
                          name="mensaje"
                          rows="5"
                          placeholder="Escribe tu mensaje aquí"
                          required></textarea>
            </div>

            <div class="input-group">
                <button type="submit" class="button">Enviar Mensaje</button>
            </div>
        </form>
    </div>
@endsection
