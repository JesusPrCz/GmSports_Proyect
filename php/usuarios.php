<?php
require 'conexion.php';

// Inicializa la condición WHERE
$where = "";
if (!empty($_POST)) {
    $valor = $mysqli->real_escape_string($_POST['campo']); // Escapa el input
    if (!empty($valor)) {
        $where = "WHERE nombre LIKE '%$valor%'";
    }
}

// Realiza la consulta
$sql = "SELECT * FROM usuarios $where";
$resultado = $mysqli->query($sql);

// Manejo de errores en la consulta
if (!$resultado) {
    die("Error en la consulta: " . $mysqli->error);
}

?>

<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Perfil de Usuario</title>
</head>
<body>
<div class="container">
    <div class="row table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Contraseña</th> <!-- Corregido cierre de etiqueta -->
                <th>Acciones</th> <!-- Agregado encabezado para acciones -->
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td> <!-- Escapado para evitar XSS -->
                    <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['contraseña']); ?></td>
                    <td>
                        <a href="modificar.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                            <span class="glyphicon glyphicon-pencil"></span> Modificar
                        </a>
                        <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm-delete" data-href="eliminar.php?id=<?php echo $row['id']; ?>">
                            <span class="glyphicon glyphicon-trash"></span> Eliminar
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="perfil.php" class="btn btn-default">Regresar</a>
            </div>
        </div>
</div>
</body>
</html>
