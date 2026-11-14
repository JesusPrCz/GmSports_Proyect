<?php

$conexion = @mysqli_connect('localhost', 'root', '', 'gmsports');

if (!$conexion){
    echo ("No se pudo conectar con el servidor");
}
else{
    $base = mysqli_select_db($conexion, 'gmsports');
    if(!$base){
        echo "No se encontro la base de datos";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $pagina = implode(', ', $_POST['how-found']);
    $productosnuevos = $_POST['productosnuevos'];
    $frecuencia = implode(', ', $_POST['frecuencia']);
    $pago = $_POST['pago'];
    $comentario = $_POST['comentario'];
    $calificacion = $_POST['calificacion'];
    $gestion = $_POST['gestion'];
}
    // Inserción de datos en la base de datos
    $insertarDatos = "INSERT INTO formulario VALUES ('$nombre', '$correo', '$telefono', '$pagina', '$productosnuevos', '$frecuencia' , '$pago', '$comentario', '$calificacion', '$gestion')";
    $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);

    // Verificar si la inserción fue exitosa
    if (!$ejecutarInsertar) {
        echo "Hubo Algun error";
            }
            else{
                echo "Datos guardados correctamente<br> <a href='menu2.html'>Volver</a>";
            }
?>
