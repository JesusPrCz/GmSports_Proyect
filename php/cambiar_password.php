<?php
session_start();

// 1. Conexión a la base de datos 'gmsports'
$conexion = new mysqli("localhost", "root", "", "gmsports");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtenemos el usuario o correo guardado en la sesión
$usuario_sesion = $_SESSION['usuario'] ?? $_SESSION['correo'] ?? 'Yisus'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass_actual    = $_POST['pass_actual'];
    $pass_nueva     = $_POST['pass_nueva'];
    $pass_confirmar = $_POST['pass_confirmar'];
    $notificaciones = $_POST['notifications'];
    $region         = $_POST['region'];
    $idioma         = $_POST['language'];
    $unidad         = $_POST['unidad'];

    // Validar que las contraseñas coincidan
    if ($pass_nueva !== $pass_confirmar) {
        echo "<script>alert('Las contraseñas no coinciden.'); window.location.href='../confi.html';</script>";
        exit();
    }

    // 2. Buscar al usuario en la tabla 'cliente'
    $stmt = $conexion->prepare("SELECT contraseña FROM cliente WHERE usuario = ? OR correo = ?");
    $stmt->bind_param("ss", $usuario_sesion, $usuario_sesion);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($fila = $resultado->fetch_assoc()) {
        
        $pass_bd = $fila['contraseña'];

        // 3. Comprobar si la contraseña actual coincide (soporta texto plano como las de tu imagen o hash)
        if ($pass_actual === $pass_bd || password_verify($pass_actual, $pass_bd)) {
            
            // 4. Actualizar contraseña y las nuevas preferencias
            $update = $conexion->prepare("UPDATE cliente SET contraseña = ?, notificaciones = ?, region = ?, idioma = ?, unidad = ? WHERE usuario = ? OR correo = ?");
            $update->bind_param("sssssss", $pass_nueva, $notificaciones, $region, $idioma, $unidad, $usuario_sesion, $usuario_sesion);

            if ($update->execute()) {
                echo "<script>alert('¡Configuración guardada con éxito!'); window.location.href='../confi.html';</script>";
            } else {
                echo "<script>alert('Error al guardar los cambios en la base de datos.'); window.location.href='../confi.html';</script>";
            }

        } else {
            echo "<script>alert('La contraseña actual es incorrecta.'); window.location.href='../confi.html';</script>";
        }

    } else {
        echo "<script>alert('Usuario no encontrado en la sesión.'); window.location.href='../confi.html';</script>";
    }
}
?>