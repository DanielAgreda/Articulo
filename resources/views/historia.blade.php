{{-- resources/views/historia.blade.php --}}

@extends('layouts.public')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/historia.css') }}">
@endpush

@section('title', 'Historia')

@section('content')
    <header class="hero">
        <h1>Nuestra Historia</h1>
        <p>Conoce los momentos más importantes que definieron nuestra trayectoria.</p>
    </header>

    <section class="historia-content">
        <article>
            <h2>El Inicio</h2>
            <img src="{{ asset('assets/historia 1.jpg') }}" alt="Imagen del inicio de la empresa">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Ipsa quaerat numquam error, obcaecati reiciendis,
                expedita quas laborum voluptates odio voluptatem,
                culpa consequuntur alias animi odit natus nam sed esse a!
            </p>
        </article>

        <article>
            <h2>Crecimiento y Logros</h2>
            <img src="{{ asset('assets/historia 2.jpg') }}" alt="Imagen de logros importantes">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Ipsa quaerat numquam error, obcaecati reiciendis,
                expedita quas laborum voluptates odio voluptatem,
                culpa consequuntur alias animi odit natus nam sed esse a!
            </p>
        </article>

        <article>
            <h2>Misión y Visión</h2>
            <img src="{{ asset('assets/historia 3.jpg') }}" alt="Imagen sobre misión y visión">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Ipsa quaerat numquam error, obcaecati reiciendis,
                expedita quas laborum voluptates odio voluptatem,
                culpa consequuntur alias animi odit natus nam sed esse a!
            </p>
        </article>

        <article>
            <h2>El Futuro</h2>
            <img src="{{ asset('assets/historia 4.jpg') }}" alt="Imagen del futuro de la empresa">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Ipsa quaerat numquam error, obcaecati reiciendis,
                expedita quas laborum voluptates odio voluptatem,
                culpa consequuntur alias animi odit natus nam sed esse a!
            </p>
        </article>
    </section>
@endsection
