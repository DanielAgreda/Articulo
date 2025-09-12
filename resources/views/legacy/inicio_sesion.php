<?php
session_start();
if (isset($_SESSION['error_login'])) {
    echo "<script>alert('Error: " . $_SESSION['error_login'] . "');</script>";
    unset($_SESSION['error_login']);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ciclismo - Inicio de Sesión</title>
        <link rel="stylesheet" href="estilos/inicio_sesion.css  ">
    </head>
    <body>
    <div class="background-aurora"></div>
        <nav>
            <div class="container_menu">
                <div class="container_items">
                    <div id="logo">
                        <img src = "assets/Metatash.jpg" alt = "imagen 0">
                        <h1>CICLISMO</h1>
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
            </div>
        </nav>
        <div class="login-container">
            <h1>Iniciar Sesión</h1>
            <form action="login_y_registro/login_usuario.php" method="POST">
                <div class="input-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo" required>
                </div>
                <div class="input-group">
                    <label for="pass">Contraseña</label>
                    <input type="password" id="pass" name="pass" placeholder="Ingresa tu contraseña" required>
                </div>
                <div>
                    <button type="submit" class="login-button" name="login">Iniciar Sesión</button>
                    <p class="register-link">¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
                </div>
            </form>
        </div>
        <footer>
            <p>&copy; 2024 Ciclismo. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>
