<?php
require 'conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];


$sql = "UPDATE usuarios SET nombre='$nombre', email='$email', contraseña='$contraseña' WHERE id = '$id'";
$resultado = $mysqli->query($sql);

// Redirigir a index.php después de la actualización
if ($resultado) {
    header("Location: usuarios.php?mensaje=Registro modificado correctamente");
    exit();
} else {
    echo "ERROR AL MODIFICAR: " . $mysqli->error;
}
?>

<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row" style="text-align:center">
        <h3>REGISTRO MODIFICADO</h3>
        <a href="index.php" class="btn btn-primary">Regresar</a>
    </div>
</div>
</body>
</html>
