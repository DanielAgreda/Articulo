<?php
if (isset($_POST["registrar-ciclista"])) {

    try {
        
        if (empty($_POST['correo']) || empty($_POST['nombres']) || empty($_FILES["imagen-ciclista"]["tmp_name"])) {
            throw new Exception("Faltan campos obligatorios (correo, nombre o imagen).");
        }

    
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombres']);
        $apellido = mysqli_real_escape_string($conexion, $_POST['apellidos']);
        $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
        $equipo = mysqli_real_escape_string($conexion, $_POST['equipo']);
        $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
        $fecha_nacimiento = mysqli_real_escape_string($conexion, $_POST['fecha_nacimiento']);
        $pais = mysqli_real_escape_string($conexion, $_POST['pais_origen']);
        $referencia = mysqli_real_escape_string($conexion, $_POST['referencia_cicla']);
        $tipo_carrera = mysqli_real_escape_string($conexion, $_POST['tipo_carrera']);
        $nombre_carrera = mysqli_real_escape_string($conexion, $_POST['nombre_carrera']);
        $pais_carrera = mysqli_real_escape_string($conexion, $_POST['pais_carrera']);

        
        $imagen = $_FILES["imagen-ciclista"]["tmp_name"];
        $nombre_imagen = $_FILES["imagen-ciclista"]["name"];
        $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION));
        $size_imagen = $_FILES["imagen-ciclista"]["size"];
        $directorio = "software 2/assets/";


        if (!in_array($tipo_imagen, ["jpg", "jpeg", "png"])) {
            throw new Exception("Tipo de imagen no válido.");
        }

    
        if ($size_imagen > 2 * 1024 * 1024) {
            throw new Exception("La imagen excede el tamaño máximo permitido (2MB).");
        }

        
        $sqlcorreo = "SELECT * FROM ciclista WHERE email = '$correo'";
        $resultadocorreo = $conexion->query($sqlcorreo);
        if ($resultadocorreo->num_rows > 0) {
            throw new Exception("El ciclista ya está registrado.");
        }

        
        $rutaImagen = "";

        
        $sqlusuario = "INSERT INTO ciclista (nombres, apellidos, email, telefono, fecha_nacimiento, pais, referencia, tipo_carrera, nombre_carrera, pais_carrera, imagen) 
                        VALUES ('$nombre','$apellido','$correo','$telefono','$fecha_nacimiento', '$pais', '$referencia', '$tipo_carrera', '$nombre_carrera', '$pais_carrera', '')";

        if (!$conexion->query($sqlusuario)) {
            throw new Exception("Error al registrar ciclista: " . $conexion->error);
        }

        $idregistro = $conexion->insert_id;
        $rutaImagen = $directorio . $idregistro . "." . $tipo_imagen;

        if (!move_uploaded_file($imagen, $rutaImagen)) {
            throw new Exception("Error al guardar la imagen en el servidor.");
        }

        
        $conexion->query("UPDATE ciclista SET imagen = '$rutaImagen' WHERE id_ciclista = $idregistro");

        echo "<script>
                alert('Ciclista registrado correctamente');
                window.location = 'ingresar_miembros.php';
              </script>";

    } catch (Exception $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location = 'ingresar_miembros.php';
              </script>";
    }

    
    echo "<script>history.replaceState(null,null,location.pathname)</script>";
}
?>
