<nav>
    <div class="container_menu">
        <div class="container_items">
            <div id="logo">
                <img src="{{ asset('assets/Metatash.jpg') }}" alt="imagen 0">
                <h1>CICLISMO</h1>
            </div>
            <div class="botones_menu">
                <a href="{{ url('/inicio-sesion') }}" class="button">INICIAR SESIÓN</a>
                <a href="{{ url('/registro') }}" class="button">REGISTRARSE</a>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/') }}">INICIO</a>
            <a href="{{ url('/carreras') }}">CARRERAS</a>
            <a href="{{ url('/equipo') }}">EQUIPO</a>
            <a href="{{ url('/noticias') }}">NOTICIAS</a>
            <a href="{{ url('/historia') }}">HISTORIA</a>
            <a href="{{ url('/contacto') }}">CONTACTO</a>
        </div>
    </div>
</nav>