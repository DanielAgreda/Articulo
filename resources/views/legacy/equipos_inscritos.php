<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos/equipos_inscritos.css">
        <title>Equipos Inscritos</title>
    </head>
    <body>
        <div class="barra-navegacion"> 
            <nav>
                <ul>
                    <li id="logo">
                        <h1><a href="admin.php"></a>CICLISMO</h1>
                    </li>
                    <li id="secciones">
                        <a href="ticketA.php">Ticket</a>
                        <a href="equipos_inscritos.php">Equipos</a>
                    </li>
                    <li>
                        <a href="index.php" class="button">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="contenido">
            <ul>
                <?php
                    include("conexion/conexion.php");
                    $sql = "SELECT equipo FROM ciclistas";
                    $result = $conexion->query($sql);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo " <li>
                                    <div class='equipo-container'>
                                        <div class='equipo_show equipo_show--click'>
                                            <a href='#'>".$row['equipo']."</a>
                                        </div>
                                        <div class='equipo_show equipo_show--inside'>
                                            ".
                                            $sql1 = "SELECT * FROM ciclista";
                                            $result1 = $conexion->query($sql1);
                                            if($result1->num_rows > 0){
                                                while($row1 = $result1->fetch_assoc()){
                                                    echo "<ul>
                                                            <li>
                                                                <img src='".$row1['imagen']."' alt='integrante-".$row1['id_ciclista']."'>
                                                                <div class='nombre'>".$row1['nombres']." ".$row2['apellidos']."</div>
                                                            </li>
                                                        </ul>";
                                                };
                                            } else{
                                                echo "<scriot>
                                                        alert('No hay integrantes en el equipo');
                                                        window.location = 'equipos_inscritos.php'
                                                    </script>";
                                            };"
                                        </div>
                                    </div>
                                </li>";
                        }
                    } else {
                        echo "<script>
                                alert('El equipo no existe en la base de datos');
                                window.location = 'equipos_inscritos.php';
                            </script>";
                    }
                ?>
            </ul>
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