<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'paginaweb';

$conexion = new mysqli($server, $user, $pass, $db);

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $pagina = implode(', ', $_POST['how-found']);
    $productosnuevos = $_POST['productosnuevos'];
    $comentario = $_POST['comentario'];
    $calificacion = $_POST['calificacion'];
    $gestion = $_POST['gestion'];

    // Inserción de datos en la base de datos
    $insertarDatos = "INSERT INTO formulario (nombre, correo, telefono, pagina, productosnuevos, comentario, calificacion, gestion) VALUES ('$nombre', '$correo', '$telefono', '$pagina', '$productosnuevos', '$comentario', '$calificacion', '$gestion')";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Nike</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .checkbox-group label,
        .radio-group label {
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 10px;
        }
        .checkbox-group input,
        .radio-group input {
            margin-right: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>Tienda Nike</h1>
    <form action="#" name="paginaweb" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="name" name="nombre" required>

        <label for="email">Correo:</label>
        <input type="email" id="email" name="correo" required>

        <label for="phone">Teléfono:</label>
        <input type="tel" id="phone" name="telefono" required>

        <label>¿Cómo conociste nuestra página?</label>
        <div class="checkbox-group">
            <label><input type="checkbox" name="how-found[]" value="social-media"> Redes sociales</label>
            <label><input type="checkbox" name="how-found[]" value="internet-search"> Búsqueda por internet</label>
            <label><input type="checkbox" name="how-found[]" value="recommendation"> Recomendación</label>
        </div>

        <label>¿Qué productos nuevos te gustaría que implementáramos?</label>
        <div class="radio-group">
            <label><input type="radio" name="productosnuevos" value="shirts"> Playeras</label>
            <label><input type="radio" name="productosnuevos" value="pants"> Pantalones</label>
            <label><input type="radio" name="productosnuevos" value="accessories"> Accesorios</label>
            <label><input type="radio" name="productosnuevos" value="other"> Otros</label>
        </div>

        <label for="comments">¿Tienes alguna pregunta o comentario específico?</label>
        <textarea id="comments" name="comentario" rows="3"></textarea>

        <label for="rating">¿Cómo calificarías tu experiencia en nuestra página?</label>
        <select id="rating" name="calificacion">
            <option value="">Selecciona una opción</option>
            <option value="excellent">Excelente</option>
            <option value="good">Buena</option>
            <option value="regular">Regular</option>
        </select>

        <label for="suggestions">¿Consideras que debemos mejorar la gestión de la página?</label>
        <textarea id="suggestions" name="gestion" rows="3"></textarea>

        <label for="damaged-item">Si algún artículo llegó en mal estado, puedes anexarlo aquí:</label>
        <input type="file" id="damaged-item" name="damaged-item">

        <button type="submit" name="submit">Enviar</button>
    </form>

    <section>
        <h2>Recomendaciones de la Tienda Nike</h2>
        <p>Bienvenido a la Tienda Nike, donde ofrecemos una amplia gama de productos deportivos de alta calidad. Nuestro objetivo es brindarte la mejor experiencia de compra y satisfacer tus necesidades. A través de este formulario, queremos conocer tu opinión y sugerencias para mejorar continuamente nuestros servicios y productos. Tu retroalimentación es muy valiosa para nosotros.</p>
        <p>Agradecemos tu tiempo y confianza en nuestra marca. Estamos comprometidos a ofrecerte productos innovadores y un excelente servicio al cliente.</p>
    </section>
</body>
</html>
