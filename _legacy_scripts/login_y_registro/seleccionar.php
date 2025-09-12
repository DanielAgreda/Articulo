<?php
if (isset($_POST["mostrar-ciclista"])) {
    try {
        
        if (empty($_POST['correo']) || empty($_POST['equipo'])) {
            throw new Exception("Debes ingresar tanto el correo como el nombre del equipo.");
        }

        $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
        $equipo = mysqli_real_escape_string($conexion, $_POST['equipo']);

        
        $sqlUser = "SELECT * FROM users WHERE email = '$correo'";
        $resultadoUser = $conexion->query($sqlUser);
        if ($resultadoUser->num_rows === 0) {
            throw new Exception("Correo de manager no encontrado.");
        }

        $sqlCiclistas = "SELECT * FROM ciclista WHERE equipo = '$equipo'";
        $resultadoCiclistas = $conexion->query($sqlCiclistas);
        if ($resultadoCiclistas->num_rows === 0) {
            throw new Exception("No hay ciclistas registrados en ese equipo.");
        }

        
        echo "<script>
                window.location = 'equipo_usuario.php';
              </script>";

    } catch (Exception $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location = 'mostrar_equipo.php';
              </script>";
    }

    
    echo "<script>history.replaceState(null, null, location.pathname);</script>";
}
?>
