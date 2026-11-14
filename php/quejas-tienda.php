<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'gmsports';

$conexion = new mysqli($server, $user, $pass, $db);

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Inserción de datos en la base de datos
    $insertarDatos = "INSERT INTO quejas_tienda (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";
    $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);

    // Verificar si la inserción fue exitosa
    if ($ejecutarInsertar) {
        echo "Datos guardados exitosamente.";
    } else {
        echo "Error al guardar los datos: " . mysqli_error($conexion);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quejas - Tienda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(254, 128, 222);
            margin: 0;
            padding: 20px;
	background-size: cover;
        }

        .complaint-container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
 font-family: Helvetica;
font-size: 20px;
font-weight: bold;
 font-style: italic;
 background-color: #ff7e53;
 border-style: solid;
 border-color: #5bf7f7;
border-width: 8px;
 margin: 14px;
padding: 20px;
border-radius: 14px;

        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin: 15px 0;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-button {
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

        .submit-button:hover {
            background-color: #0056b3;
        }
            .boton {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
<center>
    <div class="complaint-container">
        <h1>Quejas - Tienda</h1>
         <form action="#" name="paginaweb" method="post">
            <div class="form-group">
                <label for="name">Tu Nombre:</label>
                <input type="text" id="name" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Tu Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="complaint">Descripción de la Queja:</label>
                <textarea id="complaint" name="mensaje" rows="5" required></textarea>
            </div>
            <button class="boton" type="submit" name="submit">Enviar Queja</button>
            <div class="form-group">
        
            <div class="botones-container">
      <button class="boton" onclick="continuarcompra()">Regresar</button>
    </div>    

    <script>
        function continuarcompra() {
            window.location.href = '../menu2.html';// Aquí se l puede redirigir a otra página o realizar otra acción
        }
        </script>
        </div>
        </form>
    </div>
</center>
</body>
</html>
