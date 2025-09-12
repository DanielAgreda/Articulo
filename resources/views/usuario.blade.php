@extends('layouts.user')

@section('title', 'Panel de Usuario')

@section('content')
<div id="contenido">
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
            <div class="d-flex justify-center mt-4">
                <a href="{{ url('noticias') }}" class="button">NOTICIAS</a>
            </div>
        </div>

        <div id="equipo" class="mt-12">
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
</div>
@endsection
