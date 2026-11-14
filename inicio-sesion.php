<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
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
        .campo .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
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
    </style>
</head>
<body>
<div class="contenedor">
    <h2>Inicio de Sesión</h2>
    <form method="post" action="inicio-sesion.php">
       
        <div class="campo">
            <label for="correo">Correo Electrónico</label>
            <input type="email" name="correo" placeholder="Ingresa tu correo electrónico" required>
            <div class="error-message" id="correo-error"></div>
        </div>
        <div class="campo">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contraseña" placeholder="Ingresa tu contraseña" required>
            <div class="error-message" id="contrasena-error"></div>
        </div>
        
        <input type="submit" name="login" class="boton" value="Enviar">
    </form>
    <div class="botones-container">
        <br><button class="boton" onclick="crearCuenta()">Crear nueva cuenta</button><br>
        <br><button class="boton" onclick="regresar()">Regresar</button><br>
    </div>
    <?php 
        session_start(); // Iniciar la sesión
        include("php/registrar.php"); 

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $correo = trim($_POST['correo']);
            $contraseña = trim($_POST['contraseña']);

            // Validar si el usuario, correo y teléfono existen
            $correoValido = verificarCorreo($correo);
            
            if (!$correoValido) {
                echo "<script>document.getElementById('correo-error').innerText = 'Este correo no está asociado a ninguna cuenta o es incorrecto. Por favor crea una nueva cuenta.';</script>";
            } else {
                // Aquí debes validar la contraseña
                if (validarContraseña($correo, $contraseña)) {
                    // Almacenar el correo en la sesión
                    $_SESSION['usuario'] = $correo; // Guardar el correo del usuario en la sesión
                    echo "<script>alert('Inicio de sesión exitoso. Puedes ir a tu perfil.');</script><script>window.location.href = 'menu2.html';</script>"; // Mensaje de éxito
                } else {
                    echo "<script>document.getElementById('contrasena-error').innerText = 'Contraseña incorrecta.';</script>";
                }
            }
        }
        

        function verificarCorreo($correo) {
            include("php/con_db.php"); // Incluir la conexión a la base de datos
            $consulta = "SELECT * FROM cliente WHERE correo='$correo'";
            $resultado = mysqli_query($conex, $consulta);
            return mysqli_num_rows($resultado) > 0; // Retorna true si existe
        }


        function validarContraseña($correo, $contraseña) {
            include("php/con_db.php"); // Incluir la conexión a la base de datos
            $consulta = "SELECT * FROM cliente WHERE correo='$correo' AND contraseña='$contraseña'";
            $resultado = mysqli_query($conex, $consulta);
            return mysqli_num_rows($resultado) > 0; // Retorna true si la contraseña es correcta
        }
    ?>
    <script>
        function regresar() {
            window.location.href = 'inicio1.php'; // Redirigir a otra página
        }

        function crearCuenta() {
            window.location.href = 'crear_cuenta.php'; // Redirigir a la página de crear cuenta
        }
    </script>
</div>
<body>
</html>