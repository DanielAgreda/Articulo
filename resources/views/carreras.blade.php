{{-- resources/views/carreras.blade.php --}}

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/carreras.css') }}">
@endpush

@extends('layouts.public')

@section('title', 'Carreras')

@section('content')
    <div id="carreras" style="margin-top: 50px;">
        <h1 class="titulos-decorados">CARRERAS</h1>
        <ul class="carreras-lista">
            <li class="carrera-item">
                <span class="fecha">27 Oct 2024</span>
                <span class="nombre">Tour de Francia</span>
                <span class="pais">
                    <img src="{{ asset('assets/francia.png') }}" alt="francia">Francia
                </span>
            </li>
            <li class="carrera-item">
                <span class="fecha">12 Oct 2024</span>
                <span class="nombre">Giro de Italia</span>
                <span class="pais">
                    <img src="{{ asset('assets/italia.png') }}" alt="italia">Italia
                </span>
            </li>
            <li class="carrera-item">
                <span class="fecha">05 Sep 2024</span>
                <span class="nombre">Vuelta a España</span>
                <span class="pais">
                    <img src="{{ asset('assets/espana.png') }}" alt="España">España
                </span>
            </li>
            <li class="carrera-item">
                <span class="fecha">1-5 Jun 2024</span>
                <span class="nombre">Cro Race</span>
                <span class="pais">
                    <img src="{{ asset('assets/croacia.png') }}" alt="Croacia">Croacia
                </span>
            </li>
            <li class="carrera-item">
                <span class="fecha">14 May 2024</span>
                <span class="nombre">Amstel Gold Race</span>
                <span class="pais">
                    <img src="{{ asset('assets/holanda.png') }}" alt="Países Bajos">Países Bajos
                </span>
            </li>
            <li class="carrera-item">
                <span class="fecha">15-20 Oct 2024</span>
                <span class="nombre">Tour of Guangxi</span>
                <span class="pais">
                    <img src="{{ asset('assets/china.png') }}" alt="China">China
                </span>
            </li>
        </ul>
    </div>
@endsection