@extends('layouts.public')

@section('title', 'Inicio')

@section('content')

    {{-- Slider --}}
    <div class="slider">
        <ul>
            <li><img src="{{ asset('assets/noticia1.jpg') }}" alt="imagen 1"></li>
            <li><img src="{{ asset('assets/anuncio2.jpg') }}" alt="imagen 2"></li>
            <li><img src="{{ asset('assets/reporte3.jpg') }}" alt="imagen 3"></li>
            <li><img src="{{ asset('assets/reporte2.jpg') }}" alt="imagen 4"></li>
        </ul>
    </div>

    {{-- Noticias --}}
    <div class="content">
        <div id="noticias">
            <h1 class="titulos-decorados">ÚLTIMAS NOTICIAS</h1>
            <ul>
                <li>
                    <img src="{{ asset('assets/noticia1.jpg') }}" alt="noticia 1">
                    <div class="titulo-noticia">Nuevas Carreras</div>
                </li>
                <li>
                    <img src="{{ asset('assets/noticia2.jpg') }}" alt="noticia 2">
                    <div class="titulo-noticia">Últimos Accidentes</div>
                </li>
                <li>
                    <img src="{{ asset('assets/noticia3.jpg') }}" alt="noticia 3">
                    <div class="titulo-noticia">Últimos Ganadores</div>
                </li>
            </ul>
            <div style="display: flex; width: 100%; justify-content: center; margin-top: 20px;">
                <a href="{{ url('/noticias') }}" class="button">NOTICIAS</a>
            </div>
        </div>

        {{-- Equipo --}}
        <div id="equipo" style="margin-top: 50px;">
            <h1 class="titulos-decorados">EL EQUIPO</h1>
            <ul>
                <li>
                    <img src="{{ asset('assets/inte1.jpg') }}" alt="integrante 1">
                    <div class="nombre">Egan Bernal</div>
                </li>
                <li>
                    <img src="{{ asset('assets/inte2.jpg') }}" alt="integrante 2">
                    <div class="nombre">Jonathan Castroviejo</div>
                </li>
                <li>
                    <img src="{{ asset('assets/inte3.jpg') }}" alt="integrante 3">
                    <div class="nombre">Laurens de Plus</div>
                </li>
                <li>
                    <img src="{{ asset('assets/inte4.jpg') }}" alt="integrante 4">
                    <div class="nombre">Pauline Ferrand-Prevot</div>
                </li>
            </ul>
        </div>
    </div>

    {{-- Historia --}}
    <div id="historia">
        <h1 class="titulos-decorados">NUESTRA HISTORIA</h1>
        <img src="{{ asset('assets/historia.jpg') }}" alt="historia">
        <a href="{{ url('/historia') }}" class="button">HISTORIA</a>
    </div>

    {{-- Contacto --}}
    <div id="contacto">
        <h1 class="titulos-decorados">CONTÁCTANOS</h1>
        <div class="formulario-contenedor">
            <div class="imagen-contacto">
                <img src="{{ asset('assets/formulario.jpg') }}" alt="Imagen de contacto">
            </div>
            <form class="formulario">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tus nombres:" required>
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Tu apellido:" required>
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" placeholder="Tu correo:" required>
                <label for="pais">País:</label>
                <input type="text" id="pais" name="pais" placeholder="Tu país:" required>
                <a class="button" type="submit" style="margin-top: 10px; align-self: center; width: 50%;">Enviar</a>
            </form>
        </div>
    </div>

@endsection