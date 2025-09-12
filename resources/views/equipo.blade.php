{{-- resources/views/equipo.blade.php --}}

@extends('layouts.public')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/equipo.css') }}">
@endpush

@section('title', 'Equipo')

@section('content')
    <h1 class="titulos-decorados-1">EQUIPOS INSCRITOS</h1>

    {{-- INEOS --}}
    <section class="equipo-section">
        <h1 class="titulos-decorados">INEOS</h1>
        <ul class="equipo-lista">
            <li>
                <img src="{{ asset('assets/inte1.jpg') }}" alt="Foto de Egan Bernal">
                <div class="nombre">
                    Egan Bernal
                    <span class="pais">
                        <img src="{{ asset('assets/colombia.png') }}" alt="Bandera de Colombia">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte2.jpg') }}" alt="Foto de Jonathan Castroviejo">
                <div class="nombre">
                    Jonathan Castroviejo
                    <span class="pais">
                        <img src="{{ asset('assets/espana.png') }}" alt="Bandera de España">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte3.jpg') }}" alt="Foto de Laurens de Plus">
                <div class="nombre">
                    Laurens de Plus
                    <span class="pais">
                        <img src="{{ asset('assets/belgica.png') }}" alt="Bandera de Bélgica">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte4.jpg') }}" alt="Foto de Pauline Ferrand-Prevot">
                <div class="nombre">
                    Pauline Ferrand-Prevot
                    <span class="pais">
                        <img src="{{ asset('assets/francia.png') }}" alt="Bandera de Francia">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte5.jpg') }}" alt="Foto de Filippo Ganna">
                <div class="nombre">
                    Filippo Ganna
                    <span class="pais">
                        <img src="{{ asset('assets/italia.png') }}" alt="Bandera de Italia">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte6.jpg') }}" alt="Foto de Kim Heiduk">
                <div class="nombre">
                    Kim Heiduk
                    <span class="pais">
                        <img src="{{ asset('assets/alemania.png') }}" alt="Bandera de Alemania">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte7.jpg') }}" alt="Foto de Artem Shmidt">
                <div class="nombre">
                    Artem Shmidt
                    <span class="pais">
                        <img src="{{ asset('assets/usa.png') }}" alt="Bandera de Estados Unidos">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte8.jpg') }}" alt="Foto de Ben Swift">
                <div class="nombre">
                    Ben Swift
                    <span class="pais">
                        <img src="{{ asset('assets/reino unido.png') }}" alt="Bandera del Reino Unido">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte9.jpg') }}" alt="Foto de Geraint Thomas">
                <div class="nombre">
                    Geraint Thomas
                    <span class="pais">
                        <img src="{{ asset('assets/reino unido.png') }}" alt="Bandera del Reino Unido">
                    </span>
                </div>
            </li>
        </ul>
    </section>

    {{-- MOVISTAR --}}
    <section class="equipo-section">
        <h1 class="titulos-decorados">MOVISTAR</h1>
        <ul class="equipo-lista">
            <li>
                <img src="{{ asset('assets/inte16.jpg') }}" alt="Foto de Nairo Quintana">
                <div class="nombre">
                    Nairo Quintana
                    <span class="pais">
                        <img src="{{ asset('assets/colombia.png') }}" alt="Bandera de Colombia">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte17.jpg') }}" alt="Foto de Fernando Gaviria">
                <div class="nombre">
                    Fernando Gaviria
                    <span class="pais">
                        <img src="{{ asset('assets/colombia.png') }}" alt="Bandera de Colombia">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte18.jpg') }}" alt="Foto de Einer Rubio">
                <div class="nombre">
                    Einer Rubio
                    <span class="pais">
                        <img src="{{ asset('assets/colombia.png') }}" alt="Bandera de Colombia">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte19.jpg') }}" alt="Foto de Diego Pescador">
                <div class="nombre">
                    Diego Pescador
                    <span class="pais">
                        <img src="{{ asset('assets/colombia.png') }}" alt="Bandera de Colombia">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte20.jpg') }}" alt="Foto de Jorge Arcas">
                <div class="nombre">
                    Jorge Arcas
                    <span class="pais">
                        <img src="{{ asset('assets/espana.png') }}" alt="Bandera de España">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte21.jpg') }}" alt="Foto de Jon Barrenetxea">
                <div class="nombre">
                    Jon Barrenetxea
                    <span class="pais">
                        <img src="{{ asset('assets/espana.png') }}" alt="Bandera de España">
                    </span>
                </div>
            </li>
        </ul>
    </section>

    {{-- UAE EMIRATES --}}
    <section class="equipo-section">
        <h1 class="titulos-decorados">UAE Emirates</h1>
        <ul class="equipo-lista">
            <li>
                <img src="{{ asset('assets/inte10.png') }}" alt="Foto de Igor Arrieta">
                <div class="nombre">
                    Igor Arrieta
                    <span class="pais">
                        <img src="{{ asset('assets/espana.png') }}" alt="Bandera de España">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte11.png') }}" alt="Foto de Juan Ayuso">
                <div class="nombre">
                    Juan Ayuso
                    <span class="pais">
                        <img src="{{ asset('assets/espana.png') }}" alt="Bandera de España">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte12.png') }}" alt="Foto de Filippo Baroncini">
                <div class="nombre">
                    Filippo Baroncini
                    <span class="pais">
                        <img src="{{ asset('assets/italia.png') }}" alt="Bandera de Italia">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte13.png') }}" alt="Foto de Alessandro Covi">
                <div class="nombre">
                    Alessandro Covi
                    <span class="pais">
                        <img src="{{ asset('assets/italia.png') }}" alt="Bandera de Italia">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte14.png') }}" alt="Foto de Brandon McNulty">
                <div class="nombre">
                    Brandon McNulty
                    <span class="pais">
                        <img src="{{ asset('assets/usa.png') }}" alt="Bandera de Estados Unidos">
                    </span>
                </div>
            </li>
            <li>
                <img src="{{ asset('assets/inte15.png') }}" alt="Foto de Sebastian Molano">
                <div class="nombre">
                    Sebastian Molano
                    <span class="pais">
                        <img src="{{ asset('assets/colombia.png') }}" alt="Bandera de Colombia">
                    </span>
                </div>
            </li>
        </ul>
    </section>
@endsection
