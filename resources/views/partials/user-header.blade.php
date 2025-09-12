<nav>
    <div class="container_menu">
        <div class="container_items">
            <div id="logo">
                <img src="{{ asset('assets/Metatash.jpg') }}" alt="logo ciclismo">
                <a href="{{ url('usuario') }}"><h1>CICLISMO</h1></a>
            </div>
            <div id="botones_menu">
                <a href="{{ route('logout') }}" class="button"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('ingresar_miembros') }}">Ingresar Miembros</a>
            <a href="{{ url('mostrar_equipo') }}">Mostrar Equipo</a>
            <a href="{{ url('update') }}">Update</a>
            <a href="{{ url('delete') }}">Delete</a>
            <a href="{{ url('ticket') }}">Ticket</a>
        </div>
    </div>
</nav>
