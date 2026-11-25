<?php
require 'conexion.php'; // Incluye la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contraseña = $_POST['contraseña'];

    // Encriptar la contraseña
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Preparar la consulta SQL
    $sql = "INSERT INTO cuenta (usuario, correo, telefono, contraseña) VALUES (?, ?, ?, ?)";
    
    // Preparar la declaración
    if ($stmt = $mysqli->prepare($sql)) {
        // Enlazar parámetros
        $stmt->bind_param("ssss", $usuario, $correo, $telefono, $contraseña);
        
        // Ejecutar la declaración
        if ($stmt->execute()) {
            // Redirigir a la página de inicio de sesión
            header("Location: inicio-sesion.php");
            exit();
        } else {
            echo "Error al registrar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $mysqli->error;
    }
}
?>
