<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ciclismo - Contacto</title>
        <link rel="stylesheet" href="estilos/contacto.css">
    </head>
    <body>
    <div class="background-aurora"></div>
        <nav>
            <div class = "container_menu">
                <div class="container_items">
                    <div id="logo">
                        <img src = "assets/Metatash.jpg" alt = "imagen 0">
                        <h1>CICLISMO</h1>
                    </div>
                    <div class="botones_menu">
                        <a href="inicio_sesion.php" class="button">INICIAR SESION</a>
                        <a href="registro.php"class = "button">REGISTRARSE</a>
                    </div>
                </div>
                <div class="menu">
                    <a href="index.php">INICIO</a>
                    <a href="carreras.php">CARRERAS</a>
                    <a href="equipo.php">EQUIPO</a>
                    <a href="noticias.php">NOTICIAS</a>
                    <a href="historia.php">HISTORIA</a>
                    <a href="contacto.php">CONTACTO</a>
                </div>
            </div>
        </nav>
        <img src="assets/contacto.png" alt="imagen contacto" style="width: 100%;">
        <div class="contact-container">
            <h1 class="titulos-decoraddos">Contáctanos</h1>
            <p >Si tienes alguna pregunta o comentario, no dudes en escribirnos.</p>
            <form id="contacto-usuario" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" style="margin-top: 10px;">
                <div class="input-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
                </div>
                <div class="input-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Tu apellido" required>
                </div>
                <div class="input-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required>
                </div>
                <div class="input-group">
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí" required></textarea>
                </div>
                <div class="input-group">
                    <button type="submit" class="button">Enviar Mensaje</button>
                </div>
            </form>
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