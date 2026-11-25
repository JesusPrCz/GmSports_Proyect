<?php
session_start(); // Iniciar la sesión

// Destruir todas las variables de sesión
$_SESSION = array(); // Limpiar la sesión

// Si se desea destruir la sesión completamente, también se debe borrar el identificador de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio
header("Location: inicio1.php");
exit();
?>
