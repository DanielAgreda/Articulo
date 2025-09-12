<?php 

if (isset($_POST["eliminar-ciclista"])) {
    try {
        
        if (empty($_POST['correo'])) {
            throw new Exception("Debe ingresar un correo para eliminar el ciclista.");
        }
        
        $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
        
        $sql = "SELECT * FROM ciclista WHERE email = '$correo'";
        $resultado = $conexion->query($sql);
        if (!$resultado) {
            throw new Exception("Error al buscar el ciclista: " . $conexion->error);
        }
        if ($resultado->num_rows > 0) {
            
            $sqlEliminar = "DELETE FROM ciclista WHERE email = '$correo'";
            if ($conexion->query($sqlEliminar)) {
                echo "<script>
                        alert('Ciclista eliminado correctamente.');
                        window.location = 'delete.php';
                    </script>";
            } else {
                throw new Exception("Error al eliminar ciclista: " . $conexion->error);
            }
        } else {
            echo "<script>
                    alert('El ciclista ingresado no existe.');
                    window.location = 'delete.php';
                </script>";
        }
    } catch (Exception $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location = 'delete.php';
            </script>";
    }
}
?>
