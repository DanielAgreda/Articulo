{{-- resources/views/noticias.blade.php --}}

@extends('layouts.public')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/noticias.css') }}">
@endpush

@section('title', 'Noticias')

@section('content')
    <section class="noticias-section">
        <h1 class="titulos-decorados">NOTICIAS</h1>

        <div class="filtros">
            <button onclick="filtrarNoticias('todas')">Todas</button>
            <button onclick="filtrarNoticias('reportes')">Reportes Carreras</button>
            <button onclick="filtrarNoticias('anuncios')">Anuncios</button>
            <button onclick="filtrarNoticias('noticias')">Noticias</button>
        </div>

        <ul class="noticias-lista">
            <li class="noticia-item reportes">
                <img src="{{ asset('assets/reporte1.jpg') }}" alt="Reporte 1">
                <div class="nombre">Reporte Carrera: Tour de Francia</div>
                <div class="fecha">27 Oct 2024</div>
            </li>
            <li class="noticia-item anuncios">
                <img src="{{ asset('assets/anuncio1.jpg') }}" alt="Anuncio 1">
                <div class="nombre">Anuncio: Nuevo Patrocinador</div>
                <div class="fecha">20 Oct 2024</div>
            </li>
            <li class="noticia-item noticias">
                <img src="{{ asset('assets/noticia1.jpg') }}" alt="Noticia 1">
                <div class="nombre">Noticias: Novedades del equipo</div>
                <div class="fecha">15 Oct 2024</div>
            </li>
            <li class="noticia-item reportes">
                <img src="{{ asset('assets/reporte2.jpg') }}" alt="Reporte 2">
                <div class="nombre">Reporte Carrera: Giro de Italia</div>
                <div class="fecha">12 Oct 2024</div>
            </li>
            <li class="noticia-item anuncios">
                <img src="{{ asset('assets/anuncio2.jpg') }}" alt="Anuncio 2">
                <div class="nombre">Anuncio: Cambios en el Staff</div>
                <div class="fecha">05 Oct 2024</div>
            </li>
            <li class="noticia-item noticias">
                <img src="{{ asset('assets/noticia2.jpg') }}" alt="Noticia 2">
                <div class="nombre">Noticias: Nueva Temporada</div>
                <div class="fecha">01 Oct 2024</div>
            </li>
            <li class="noticia-item reportes">
                <img src="{{ asset('assets/reporte3.jpg') }}" alt="Reporte 3">
                <div class="nombre">Reporte Carrera: Vuelta España</div>
                <div class="fecha">30 Sep 2024</div>
            </li>
            <li class="noticia-item anuncios">
                <img src="{{ asset('assets/anuncio3.jpg') }}" alt="Anuncio 3">
                <div class="nombre">Anuncio: Nuevos Equipamientos</div>
                <div class="fecha">05 Sep 2024</div>
            </li>
            <li class="noticia-item noticias">
                <img src="{{ asset('assets/noticia3.jpg') }}" alt="Noticia 3">
                <div class="nombre">Noticias: Ciclistas Lesionados</div>
                <div class="fecha">01 Nov 2024</div>
            </li>
        </ul>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/noticias.js') }}"></script>
@endpush
