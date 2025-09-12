<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/conexion/conexion.php");
if (isset($_POST["login"])) {
    try {
        if (empty($_POST['correo']) || empty($_POST['pass'])) {
            throw new Exception("Por favor, completa todos los campos.");
        }
        $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
        $password = $_POST['pass'];
        
        $stmt = $conexion->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado->num_rows === 0) {
            throw new Exception("Usuario no encontrado.");
        }
        $usuario = $resultado->fetch_assoc();
        
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nombre'] = $usuario['nombres'];
        $_SESSION['correo'] = $usuario['email'];

        
        if ($usuario['email'] === 'admin@gmail.com') {
            header("Location: admin.php");
        } else {
            header("Location: usuario.php");
        }
        exit();

    } catch (Exception $e) {
        $_SESSION['error_login'] = $e->getMessage();
        header("Location: inicio_sesion.php");
        exit();
    }
}
?>
