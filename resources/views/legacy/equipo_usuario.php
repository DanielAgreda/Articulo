<?php

include("conexion/conexion.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>USUARIO</title>
        <link rel="stylesheet" href="estilos/equipo_usuario.css">
    </head>
    <body>
        <div class="barra-navegacion">
            <nav>
                <ul>
                    <li>
                        <div id="logo">
                            <h1><a href="usuario.php">CICLISMO</a></h1>
                        </div>
                    </li>
                    <li id="secciones">
                        <a href="mostrar_equipo.php">Mostrar Equipo</a>
                        <a href="ingresar_miembros.php">Ingresar Miembros</a>
                        <a href="update.php">Update</a>
                        <a href="delete.php">Delete</a>
                        <a href="ticket.php">Ticket</a>
                    </li>
                    <li id="sesion">
                        <a href="index.php" class="button">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="contenido">
            <div class="equipo" style="margin-top: 50px;">
                <ul>
                    <?php
                        include("conexion/conexion.php");
                        $sql = "SELECT * FROM ciclista";
                        $result = $conexion->query($sql);   
                        $rows = $result->num_rows;
                        if($rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo "<script>
                                        <img src='".$row['imagen']."' alt='integrante-1'>
                                        <div class='nombre'>".$row['nombres']." ".$row['apellidos']."
                                        </div>
                                    </script>";
                            }
                        }
                    ?>
                </ul>
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