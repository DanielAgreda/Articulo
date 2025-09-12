<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos/ticketA.css">
        <title>Ticket</title>
    </head>
    <body>
        <div class="barra-navegacion">
            <nav>
                <ul>
                    <li id="Logo">
                        <h1><a href="admin.php">CICLISMO</a></h1>
                    </li>
                    <li id="secciones">
                        <a href="ticketA.php">Ticket</a>
                        <a href="equipos_inscritos.php">Equipos</a>
                    </li>
                    <li id="sesion">
                        <a href="index.php" class="button">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="contenido">
            <div class="nav-tickets">
                <ul class="ticket-use">
                    <li class="all-ticket">
                        <div class="ticket_show ticket_show--click">
                            <a href="#" class="nav_ticket">Todos los tickets</a>
                        </div>
                        <div class="ticket_show ticket_show--inside">
                            <ul>
                                <?php
                                    include("conexion/conexion.php");
                                    $sql = "SELECT * FROM ticket";
                                    $resultado = $conexion->query($sql);
                                    if($resultado->num_rows > 0){
                                        while($row->fetch_assoc()){
                                            echo "<li>
                                                    <div class='ticket-container'>
                                                        <div class='ticket_show ticket_show--click'>
                                                            <a href='#' class='nav-ticket'>".$row['titulo']."</a>
                                                        </div>
                                                        <div class='ticket_show ticket_show--inside'>
                                                            <p>".$row['descripcion']."</p>
                                                            <p>".$row['estado']."<p/>
                                                        </div>
                                                    </div>
                                                </li>";
                                        }
                                    } else {
                                        echo "<script>
                                                alert('No existen tickets');
                                                window.location = 'ticketA.php';
                                            </script>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </li>
                    <li class="ticket-Resolve">
                        <div class="ticket_show ticket_show--click">
                            <a href="#" class="nav_ticket">Tickets Resueltos</a>
                        </div>
                        <div class="ticket_show ticket_show--inside">
                            <ul>
                                <?php
                                    include("conexion/conexion.php");
                                    $sql = "SELECT * FROM ticket";
                                    $resultado = $conexion->query($sql);
                                    if(result->num_rows > 0){
                                        while($row->fetch_assoc()){
                                            if($row['estado'] === 'Inactivo'){
                                                echo "<li>
                                                    <div class='ticket-container'>
                                                        <div class='ticket_show ticket_show--click'>
                                                            <a href='#' class='nav-ticket'>".$row['titulo']."</a>
                                                        </div>
                                                        <div class='ticket_show ticket_show--inside'>
                                                            <p>".$row['descripcion']."</p>
                                                            <h2>Ticket resuelto</h2>
                                                        </div>
                                                    </div>
                                                </li>";
                                            }
                                        }
                                    } else {
                                        echo "<script>
                                                alert('No existen tickets');
                                                window.location = 'ticketA.php';
                                            </script>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </li>
                    <li class="ticket-Unresolve">
                        <div class="ticket-Unresolve">
                            <a href="#" class="nav_ticket">Tickets sin Resolver</a>
                        </div>
                        <div class="ticket_show ticket_show--inside">
                            <ul>
                                <?php
                                    include("conexion/conexion.php");
                                    $sql = "SELECT * FROM ticket";
                                    $resultado = $conexion->query($sql);
                                    if(result->num_rows > 0){
                                        while($row->fetch_assoc()){
                                            if($row['estado'] === 'Activo'){
                                                echo "<li>
                                                    <div class='ticket-container'>
                                                        <div class='ticket_show ticket_show--click'>
                                                            <a href='#' class='nav-ticket'>".$row['titulo']."</a>
                                                        </div>
                                                        <div class='ticket_show ticket_show--inside'>
                                                            <p>".$row['descripcion']."</p>
                                                            <p>Ya se resolvio el ticket?</p>
                                                            <button type='submit' action='#'>Resolver</button>
                                                        </div>
                                                    </div>
                                                </li>"; 
                                            }
                                        }
                                    } else {
                                        echo "<script>
                                                alert('No existen tickets');
                                                window.location = 'ticketA.php';
                                            </script>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <footer>
            <p>&copy; 2024 Ciclismo. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>
