<?php
if (isset($_POST["actualizar-ciclista"])) {

    
    try {
        
        if (!$conexion) {
            throw new Exception("Error de conexión a la base de datos.");
        }

        
        if (empty($_POST['correo'])) {
            throw new Exception("El correo del ciclista es obligatorio.");
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

        
        $sql = "SELECT * FROM ciclista WHERE email = '$correo'";
        $resultadocorreo = $conexion->query($sql);

        if (!$resultadocorreo) {
            throw new Exception("Error al verificar correo: " . $conexion->error);
        }

        if ($resultadocorreo->num_rows > 0) {
            
            if (!empty($nombre_imagen)) {
                if (in_array($tipo_imagen, ["jpg", "jpeg", "png"])) {
                    $ruta_final = $directorio . basename($nombre_imagen);
                    if (!move_uploaded_file($imagen, $ruta_final)) {
                        throw new Exception("Error al subir imagen.");
                    }
                    $conexion->query("UPDATE ciclista SET imagen = '$ruta_final' WHERE email = '$correo'");
                } else {
                    throw new Exception("Tipo de imagen no permitido. Solo JPG, JPEG, PNG.");
                }
            }

            
            $sqlupdate = "UPDATE ciclista SET 
                nombres='$nombre', 
                apellidos='$apellido',
                equipo = '$equipo',
                telefono='$telefono', 
                fecha_nacimiento='$fecha_nacimiento', 
                pais='$pais', 
                referencia='$referencia', 
                tipo_carrera='$tipo_carrera', 
                nombre_carrera='$nombre_carrera', 
                pais_carrera='$pais_carrera' 
                WHERE email='$correo'";

            if (!$conexion->query($sqlupdate)) {
                throw new Exception("Error al actualizar: " . $conexion->error);
            }

            echo "<script>
                    alert('Datos actualizados correctamente');
                    window.location = 'update.php';
                </script>";

        } else {
            throw new Exception("El ciclista no está registrado.");
        }
    } catch (Exception $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location = 'update.php';
            </script>";
    }
}
?>
