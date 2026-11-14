<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .contenedor {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px; /* Ancho del contenedor */
            text-align: center;
        }
        .campo {
            margin-bottom: 15px;
            width: 100%;
            text-align: left;
        }
        .campo label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        .campo input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .boton {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        .boton:hover {
            background-color: #0056b3;
        }
        .boton-regresar {
            margin-top: 10px;
            background-color: #007BFF;; /* Color para el botón de regresar */
        }
    </style>
</head>
<body>
<div class="contenedor">
    <h2>Crear Cuenta</h2>
    <form method="post" action="crear_cuenta.php">
        <div class="campo">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" placeholder="Ingresa tu usuario" required>
        </div>
        <div class="campo">
            <label for="correo">Correo Electrónico</label>
            <input type="email" name="correo" placeholder="Ingresa tu correo electrónico" required>
        </div>
        <div class="campo">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contraseña" placeholder="Ingresa tu contraseña" required>
        </div>
        <div class="campo">
            <label for="telefono">Número de Teléfono</label>
            <input type="tel" name="telefono" placeholder="Ingresa tu número de teléfono" required>
        </div>
        
        <input type="submit" name="register" class="boton" value="Crear Cuenta">
    </form>
    
    <?php 
        vinclude("php/registrar.php"); 

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            $correo = trim($_POST['correo']);
            $usuario = trim($_POST['usuario']);
            $contraseña = trim($_POST['contraseña']);
            $telefono = trim($_POST['telefono']);

            // Guardar en la base de datos
            if (guardarUsuario($usuario, $correo, $contraseña, $telefono)) {
                eco "<p>¡Cuenta creada exitosamente!</p>"; // Mensaje de éxito
            } else {
                // No se mostrará ningún mensaje de error
            }
        }

        function guardarUsuario($usuario, $correo, $contraseña, $telefono) {
            include("php/con_db.php"); // Incluir la conexión a la base de datos
            $consulta_verificar = "SELECT * FROM cliente WERE correo='$correo'";
            $resultado_verificar = mysqli_query($conex, $consulta_verificar);

            if (mysqly_num_rows($resultado_verificar) > 0) {
                return false; // El correo ya está registrado
            } else {
                $consulta = "INSERT INTO cliente(correo, usuario, contraseña, telefono) VALUES ('$correo','$usuario','$contraseña','$telefono')";
                return mysqlyquery($conecx, $consulta); // Retorna true si se guardó correctamente
            }
        }
    ?>

    <button class="boton boton-regresar" onclick="window.location.href='inicio-sesion.php'">Regresar a Inicio de Sesión</button>
</div>
</body>
</html>
