<?php 

include("con_db.php");

if (isset($_POST['register'])) {
    if (strlen($_POST['usuario']) >= 1 && strlen($_POST['correo']) >= 1) {
        $correo = trim($_POST['correo']);
        $usuario = trim($_POST['usuario']);
        $contraseña = trim($_POST['contraseña']); // Almacena la contraseña en texto plano
        $telefono = trim($_POST['telefono']); // Almacena el número de teléfono

        // Verificar si el correo ya existe
        $consulta_verificar = "SELECT * FROM cliente WHERE correo='$correo'";
        $resultado_verificar = mysqli_query($conex, $consulta_verificar);

        if (mysqli_num_rows($resultado_verificar) > 0) {
            echo '<h3 class="bad">¡El correo ya está registrado!</h3>';
        } else {
            $consulta = "INSERT INTO cliente(correo, usuario, contraseña, telefono) VALUES ('$correo','$usuario','$contraseña','$telefono')";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                echo '<h3 class="ok">¡Cuenta creada correctamente!</h3>';
            } else {
                echo '<h3 class="bad">¡Ups ha ocurrido un error!</h3>';
                echo '<p>Error: ' . mysqli_error($conex) . '</p>'; // Muestra el error de la consulta
            }
        }
    } else {
        echo '<h3 class="bad">¡Por favor complete los campos!</h3>';
    }
}

?>