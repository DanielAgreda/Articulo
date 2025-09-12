<?php
if (isset($_POST['registro-ticket'])) {
    try {
        
        if (empty($_POST['ticket']) || empty($_POST['ticket-descripcion'])) {
            throw new Exception("Por favor, completa todos los campos.");
        }

        $ticket = mysqli_real_escape_string($conexion, $_POST['ticket']);
        $descripcion = mysqli_real_escape_string($conexion, $_POST['ticket-descripcion']);

    
        $sqlVerificar = "SELECT * FROM ticket WHERE titulo = '$ticket'";
        $resultadoVerificar = $conexion->query($sqlVerificar);
        if ($resultadoVerificar->num_rows > 0) {
            throw new Exception("El ticket ya existe.");
        }

        
        $sqlInsertar = "INSERT INTO ticket (titulo, descripcion) VALUES ('$ticket', '$descripcion')";
        if (!$conexion->query($sqlInsertar)) {
            throw new Exception("Error al registrar el ticket: " . $conexion->error);
        }

        echo "<script>
                alert('Ticket registrado correctamente.');
                window.location = 'ticket.php';
              </script>";

    } catch (Exception $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location = 'ticket.php';
              </script>";
    }

    
    echo "<script>history.replaceState(null, null, location.pathname);</script>";
}
?>
