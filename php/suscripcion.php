<?php
// Conexión a la base de datos 'gmsports'
$conexion = new mysqli("localhost", "root", "", "gmsports");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre   = trim($_POST['nombre']);
    $correo   = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);

    // Validar que los campos no estén vacíos
    if (!empty($nombre) && !empty($correo) && !empty($telefono)) {
        
        // Verificar si el correo ya se suscribió previamente
        $check = $conexion->prepare("SELECT id FROM boletin WHERE correo = ?");
        $check->bind_param("s", $correo);
        $check->execute();
        $resultado = $check->get_result();

        if ($resultado->num_rows > 0) {
            echo "<script>
                    alert('Este correo ya se encuentra suscrito al boletín.');
                    window.location.href = '../Boletin_suscripcion.html';
                  </script>";
        } else {
            // Insertar datos en la tabla 'boletin'
            $stmt = $conexion->prepare("INSERT INTO boletin (nombre, correo, telefono) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre, $correo, $telefono);

            if ($stmt->execute()) {
                echo "<script>
                        alert('¡Suscripción validada! Gracias por suscribirte a nuestra página.');
                        window.location.href = '../Boletin_suscripcion.html';
                      </script>";
            } else {
                echo "<script>
                        alert('Error al procesar la suscripción.');
                        window.location.href = '../Boletin_suscripcion.html';
                      </script>";
            }
        }
    } else {
        echo "<script>
                alert('Por favor completa todos los campos.');
                window.location.href = '../Boletin_suscripcion.html';
              </script>";
    }
}
?>