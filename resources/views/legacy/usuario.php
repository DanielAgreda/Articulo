<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>USUARIO</title>
        <link rel="stylesheet" href="estilos/usuario.css">
    </head>
    <body>
    <div class="background-aurora"></div>
        <nav>
            <div class="container_menu">
                <div class="container_items">
                    <div id="logo">
                        <img src = "assets/Metatash.jpg" alt = "imagen 0">
                        <a href="usuario.php"><h1>CICLISMO</h1></a>
                    </div>
                    <div id="botones_menu">
                        <a href="index.php" class="button">Logout</a>
                    </div>
                </div>
                <div class="menu">
                    <a href="mostrar_equipo.php">Mostrar Equipo</a>
                    <a href="ingresar_miembros.php">Ingresar Miembros</a>
                    <a href="update.php">Update</a>
                    <a href="delete.php">Delete</a>
                    <a href="ticket.php">Ticket</a>
                </div>
            </div>
        </nav>
        <div id="contenido">
            <div class="content">
                <div id="noticias">
                    <h1 class="titulos-decorados">ÚLTIMAS NOTICIAS</h1>
                    <ul>    
                        <li>
                            <img src="assets/noticia1.jpg" alt="noticia 1">
                            <div class="titulo-noticia">Nuevas Carreras</div>
                        </li>
                        <li>
                            <img src="assets/noticia2.jpg" alt="noticia 2">
                            <div class="titulo-noticia">Ultimos Accidentes</div>
                        </li>
                        <li>
                            <img src="assets/noticia3.jpg" alt="noticia 3">
                            <div class="titulo-noticia">Ultimos Ganadores</div>
                        </li>
                    </ul>
                    <div style="display: flex; width: 100%; justify-content: center; margin-top: 20px;">
                        <a href="noticias.php" class="button">NOTICIAS</a>
                    </div>
                </div>
                <div id="equipo" style="margin-top: 50px;">
                    <h1 class="titulos-decorados">EL EQUIPO</h1>
                    <ul>
                        <li>
                            <img src="assets/inte1.jpg" alt="integrante 1">
                            <div class="nombre">Egan Bernal </div>
                        </li>
                        <li>
                            <img src="assets/inte2.jpg" alt="integrante 2">
                            <div class="nombre">Jonathan Castroviejo </div>
                        </li>
                        <li>
                            <img src="assets/inte3.jpg" alt="integrante 3">
                            <div class="nombre">Laurens de Plus</div>
                        </li>
                        <li>
                            <img src="assets/inte4.jpg" alt="integrante 4">
                            <div class="nombre">Pauline Ferrand-Prevot</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <footer>
            <div class="footer-contenido">
                <div class="footer-seccion">
                    <a href="carreras.php"><h3>CARRERAS</h3></a>
                    <ul>
                        <li>Reportes Carreras</li>
                        <li>Fotos</li>
                        <li>Videos</li>
                        <li>Calendario Carreras</li>
                    </ul>
                </div>
                <div class="footer-seccion">
                    <a href="equipo.php"><h3>EQUIPO</h3></a>
                    <ul>
                        <li>Ciclistas</li>
                        <li>Staff</li>
                        <li>Patrocinadores</li>
                    </ul>
                </div>
                <div class="footer-seccion">
                    <a href="noticias.php"><h3>NOTICIAS</h3></a>
                    <ul>
                        <li>Noticias</li>
                        <li>Calendario</li>
                        <li>Galeria</li>
                    </ul>
                </div>
                <div class="footer-seccion">
                    <a href="historia.php"><h3>HISTORIA</h3></a>
                    <ul>
                        <li>INEOS</li>
                        <li>The Grenadier</li>
                        <li>Camino</li>
                    </ul>
                </div>
                <div class="footer-seccion">
                    <a href="contacto.php"><h3>CONTACTO</h3></a>
                    <ul>
                        <li>Contactos</li>
                        <li>Seguirnos</li>
                        <li>Visita Más</li>
                    </ul>
                </div>
            </div>
            <p>&copy; 2024 Ciclismo. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>