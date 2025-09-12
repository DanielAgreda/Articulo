<?php
// Verifica si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['ticket'];
    $descripcion = $_POST['ticket-descripcion'];

    // URL del microservicio a través del API Gateway (Nginx)
    $url = 'http://api-gateway/ticket/'; // Utiliza el nombre del servicio API Gateway


    // Datos a enviar al microservicio
    $data = [
        'ticket' => $titulo,
        'ticket-descripcion' => $descripcion
    ];

    // Configuramos la solicitud HTTP (POST)
    $options = [
        'http' => [
            'method'  => 'POST',
            'header'  => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($data)
        ]
    ];

    // Crear el contexto de la solicitud y realizar la petición
    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    // Verificar la respuesta del microservicio
    if ($response === FALSE) {
        $message = 'Error en la solicitud';
    } else {
        // Decodificar la respuesta JSON del microservicio
        $response_data = json_decode($response, true);
        if ($response_data['status'] === 'success') {
            $message = 'Ticket creado exitosamente';
        } else {
            $message = 'Error al crear el ticket';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ciclismo</title>
    <link rel="stylesheet" href="estilos/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="background-aurora"></div>
    <nav>
        <div class="container_menu">
            <div class="container_items">
                <div id="logo">
                    <img src="assets/Metatash.jpg" alt="imagen 0">
                    <h1>CICLISMO</h1>
                </div>
                <div class="botones_menu">
                    <a href="inicio_sesion.php" class="button">INICIAR SESION</a>
                    <a href="registro.php" class="button">REGISTRARSE</a>
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

    <!-- Slider -->
    <div class="slider">
        <ul>
            <li><img src="assets/noticia1.jpg" alt="imagen 1"></li>
            <li><img src="assets/anuncio2.jpg" alt="imagen 2"></li>
            <li><img src="assets/reporte3.jpg" alt="imagen 3"></li>
            <li><img src="assets/reporte2.jpg" alt="imagen 4"></li>
        </ul>
    </div>

    <!-- Ticket Creation Form Section -->
    <div class="ticket-section" style="margin-top: 50px;">
        <h1 class="titulos-decorados">CREAR UN TICKET</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="input-group">
                <label for="ticket">Título del Ticket</label>
                <input type="text" id="ticket" name="ticket" placeholder="Título del Ticket" required>
            </div>
            <div class="input-group">
                <label for="ticket-descripcion">Descripción</label>
                <textarea id="ticket-descripcion" name="ticket-descripcion" placeholder="Describe tu problema" required></textarea>
            </div>
            <button type="submit" class="button">Crear Ticket</button>
        </form>
        <?php
        if (isset($message)) {
            echo "<p>$message</p>";
        }
        ?>
    </div>

    <!-- Noticias -->
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
        
        <!-- Equipo -->
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

    <!-- Historia -->
    <div id="historia">
        <h1 class="titulos-decorados">NUESTRA HISTORIA</h1>
        <img src="assets/historia.jpg" alt="historia">
        <a href="historia.php" class="button">HISTORIA</a>
    </div>

    <!-- Contacto -->
    <div id="contacto">
        <h1 class="titulos-decorados">CONTÁCTANOS</h1>
        <div class="formulario-contenedor">
            <div class="imagen-contacto">
                <img src="assets/formulario.jpg" alt="Imagen de contacto">
            </div>
            <form class="formulario">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tus nombres:" required>
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Tu apellido:" required>
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" placeholder="Tu correo:" required>
                <label for="pais">País:</label>
                <input type="text" id="pais" name="pais" placeholder="Tu país: " required>
                <a class="button" type="submit" style="margin-top: 10px; align-self: center; width: 50%;">Enviar</a>
            </form>
        </div>
    </div>    

    <!-- Footer -->
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
                    <li>Galería</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>