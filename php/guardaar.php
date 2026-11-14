<?php

$conexion = @mysqli_connect('localhost', 'root', '', 'paginaweb');

if (!$conexion){
    echo ("No se pudo conectar con el servidor");
}
else{
    $base = mysqli_select_db($conexion, 'paginaweb');
    if(!$base){
        echo "No se encontro la base de datos";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
}
    // Inserción de datos en la base de datos
    $insertarDatos = "INSERT INTO usuarios VALUES ('$nombre', '$correo', '$contraseña')";
    $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);

    // Verificar si la inserción fue exitosa
    if (!$ejecutarInsertar) {
        echo "Hubo Algun error";
        
            }
            else{
                echo "Datos guardados correctamente<br> <a href='index.html'>Volver</a>";
                header("Location: menu2.html");
             exit();
            }
?>
