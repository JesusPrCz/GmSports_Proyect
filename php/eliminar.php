<?php
require 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM usuarios WHERE id='$id'";
    
    if ($mysqli->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Registro eliminado correctamente");
    } else {
        echo "Error al eliminar el registro: " . $mysqli->error;
    }
} else {
    header("Location: index.php?mensaje=ID no especificado");
}
?>
