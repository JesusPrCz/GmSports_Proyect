<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #4e1414ff;
        }
        #logo {
            width: 150px; /* Se justa el tamaño del logo */
            height: auto;
            margin-bottom: 20px;
        }
        .botones-container {
            display: flex;
            gap: 10px; /* Espacio entre los botones */
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
        .boton:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <center>
    <img src="img/gm.jpg" alt="Logo" width="500" lang="300">
</center>
    <div class="botones-container">
        <button class="boton" onclick="modoInvitado()">Modo de Invitado</button>
        <button class="boton" onclick="inicioSesion()">Inicio de Sesión</button>
    </div>

    <script>
        function modoInvitado() {
            window.location.href = 'menu2.html';// Aquí se l puede redirigir a otra página o realizar otra acción
        }

        function inicioSesion() {
            window.location.href = 'inicio-sesion.php';// Aquí puedes redirigir a la página de inicio de sesión
        }
    </script>
</body>
</html>
