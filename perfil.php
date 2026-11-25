<?php
session_start(); // Iniciar la sesión

require 'php/con_db.php'; // Incluir la conexión a la base de datos

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    $usuario = ''; // Variable vacía si no hay sesión
    $correo = ''; // Variable vacía si no hay sesión
    $telefono = ''; // Variable vacía si no hay sesión
} else {
    // Obtener el correo del usuario desde la sesión
    $correo = $_SESSION['usuario'];

    // Consultar los datos del usuario usando el correo en la tabla cliente
    $sql = "SELECT * FROM cliente WHERE correo = ?"; // Usar prepared statements para mayor seguridad
    $stmt = $conex->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si se encontraron resultados
    if ($resultado->num_rows === 0) {
        die("No se encontraron registros para el correo: " . htmlspecialchars($correo));
    }

    $row = $resultado->fetch_assoc(); // Obtener los datos del usuario
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(255, 210, 105);
            margin: 0;
            padding: 20px;
        }

        .profile-container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: rgb(247, 171, 184);
        }
        
        h1 {
            text-align: center;
            color: #333;
        }

        .profile-info {
            margin: 20px 0;  
        }

        .profile-info label {
            font-weight: bold; 
            background-color: rgb(208, 247, 171);
            display: block; /* Asegurarse de que el label ocupe toda la línea */
            margin: 10px 0 5px; /* Espaciado alrededor del label */
        }

        .profile-info p {
            margin: 0 0 15px; /* Espaciado para el párrafo */
            background-color: rgb(171, 219, 247);
            padding: 10px; /* Espaciado interno para el párrafo */
            border-radius: 4px; /* Bordes redondeados para el párrafo */
        }

        .regresar-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .regresar-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h1>Perfil de Usuario</h1>
    <div class="profile-info">
        <label>Nombre de Usuario:</label>
        <p><?php echo isset($row) ? htmlspecialchars($row['usuario']) : ''; ?></p> <!-- Mostrar nombre de usuario o vacío -->

        <label>Correo Electrónico:</label>
        <p><?php echo isset($row) ? htmlspecialchars($row['correo']) : ''; ?></p> <!-- Mostrar correo o vacío -->

        <label>Número de Teléfono:</label>
        <p><?php echo isset($row) ? htmlspecialchars($row['telefono']) : ''; ?></p> <!-- Mostrar teléfono o vacío -->
    </div>

    <a href="menu2.html" class="regresar-button">Regresar al Menú</a> <!-- Botón para regresar al menú -->
</div>

</body>
</html>
