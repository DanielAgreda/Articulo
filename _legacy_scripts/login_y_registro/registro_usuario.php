<?php
if (isset($_POST["registro"])) {

    try {
        
        if (
            empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['fecha_nacimiento']) ||
            empty($_POST['sexo']) || empty($_POST['telefono']) || empty($_POST['email']) ||
            empty($_POST['pais']) || empty($_POST['ciudad']) || empty($_POST['direccion']) ||
            empty($_POST['password'])
        ) {
            throw new Exception("Todos los campos son obligatorios.");
        }

        
        $cargo = isset($_POST['cargo']) ? mysqli_real_escape_string($conexion, $_POST['cargo']) : 'Usuario';
        $equipo = isset($_POST['equipo']) ? mysqli_real_escape_string($conexion, $_POST['equipo']) : 'Ninguno';
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombres']);
        $apellido = mysqli_real_escape_string($conexion, $_POST['apellidos']);
        $fecha_nacimiento = mysqli_real_escape_string($conexion, $_POST['fecha_nacimiento']);
        $sexo = mysqli_real_escape_string($conexion, $_POST['sexo']);
        $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
        $correo = mysqli_real_escape_string($conexion, $_POST['email']);
        $pais = mysqli_real_escape_string($conexion, $_POST['pais']);
        $ciudad = mysqli_real_escape_string($conexion, $_POST['ciudad']);
        $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
        $passwordPlano = mysqli_real_escape_string($conexion, $_POST['password']);

        
        $passwordSeguro = password_hash($passwordPlano, PASSWORD_DEFAULT);

        
        $sqlCorreo = "SELECT * FROM users WHERE email = '$correo'";
        $resultadoCorreo = $conexion->query($sqlCorreo);
        if ($resultadoCorreo->num_rows > 0) {
            throw new Exception("El correo ya está registrado.");
        }

        $sqlNombre = "SELECT * FROM users WHERE nombre = '$nombre'";
        $resultadoNombre = $conexion->query($sqlNombre);
        if ($resultadoNombre->num_rows > 0) {
            throw new Exception("El nombre de usuario ya está registrado.");
        }

        
        $sqlUsuario = "INSERT INTO users (Cargo, Equipo, nombre, apellidos, fecha_nacimiento, sexo, telefono, email, pais, ciudad, direccion, contrasenia) 
                       VALUES ('$cargo', '$equipo', '$nombre', '$apellido', '$fecha_nacimiento', '$sexo', '$telefono', '$correo', '$pais', '$ciudad', '$direccion', '$passwordSeguro')";

        if (!$conexion->query($sqlUsuario)) {
            throw new Exception("Error al registrar el usuario: " . $conexion->error);
        }

        echo "<script>
                alert('Usuario registrado correctamente');
                window.location = 'index.php';
              </script>";

    } catch (Exception $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location = 'index.php';
              </script>";
    }

    
    echo "<script>history.replaceState(null, null, location.pathname);</script>";
}
?>
