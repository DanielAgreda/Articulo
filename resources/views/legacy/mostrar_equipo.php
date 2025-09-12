<?php

include("conexion/conexion.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>USUARIO</title>
        <link rel="stylesheet" href="estilos/mostrar_equipo.css">
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
            <div class="registro-container">
                <h1>Ver equipo</h1>
                <form id="registro-ciclista" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <div class="input-group">
                        <label for="correo">Correo Manager</label>
                        <input type="text" id="correo" name="correo" placeholder="Ingrese el correo">
                    </div>
                    <div class="input-group">
                        <label for="equipo">Equipo Ciclista</label>
                        <input type="text" id="equipo" name="equipo" placeholder="Ingresa el equipo">
                    </div>
                    <button type="submit" class="registro-button" name="mostrar-ciclista">Ver ciclistas</button>
                </form>
            </div>
        </div>
        <div class="equipo" style="margin-top: 50px">
            <h1 class="titulos-decorados">SU EQUIPO: </h1>
            <ul>
                <?php
                    include("conexion/conexion.php");
                    if(isset($_POST["mostrar-ciclista"])){
                        $correo = mysqli_real_escape_string($conexion,$_POST['correo']);
                        $equipo = mysqli_real_escape_string($conexion,$_POST['equipo']);
                        $sql = "SELECT * FROM users WHERE email ='$correo'";
                        $resultado = $conexion->query($sql);
                        $filas = $resultado->num_rows;
                        $sql1 = "SELECT * FROM ciclista WHERE equipo = '$equipo'";
                        $resultado1 = $conexion->query($sql1);
                        $filas1 = $resultado1->num_rows;
                        if(($filas && $filas1) > 0){
                            while(($filas = $resultado->fetch_assoc()) && ($filas1 = $resultado1->fetch_assoc())){
                                echo "<li>
                                        <img src='".$filas1['imagen']."' alt='integrante-1'>
                                        <div class='nombre'>".$filas1['nombres']." ".$filas1['apellidos']."
                                        </div>
                                    </li>
                                    <li>
                                        <img src='assets/inte2.jpg' alt='integrante 2'>
                                        <div class='nombre'>Jonathan Castroviejo </div>
                                    </li>
                                    <li>
                                        <img src='assets/inte3.jpg' alt='integrante '>
                                        <div class='nombre'>Laurens de Plus</div>
                                    </li>
                                    <li>
                                        <img src='assets/inte4.jpg' alt='integrante 4'>
                                        <div class='nombre'>Pauline Ferrand-Prevot</div>
                                    </li>";
                            };
                        } else {
                            echo "<script>
                                    alert('Correo del manager o el equipo no existen');
                                    window.location = 'mostrar_equipo.php';
                                </script>";
                        }
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