<?php
// Conexión a la base de datos (recuerda poner el nombre de tu base de datos)
$conexion = new mysqli("localhost", "root", "", "gmsports");
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insertar en la base de datos
    $sql = "INSERT INTO compras (producto, talla, color, cantidad, total, metodo_pago) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    $metodo_pago = $_POST['metodo_pago'] ?? '';
    $carrito = json_decode($_POST['carrito'] ?? '', true);
    $compraRegistrada = false;

    if (is_array($carrito) && count($carrito) > 0) {
        foreach ($carrito as $item) {
            $producto = $item['name'] ?? 'Producto sin nombre';
            $talla = $item['size'] ?? 'N/A';
            $color = $item['color'] ?? 'Ninguno';
            $cantidad = (int) ($item['quantity'] ?? 1);
            $total = (float) ($item['subtotal'] ?? 0);

            $stmt->bind_param("sssids", $producto, $talla, $color, $cantidad, $total, $metodo_pago);
            if (!$stmt->execute()) {
                break;
            }
            $compraRegistrada = true;
        }
    } else {
        $producto = $_POST['producto'] ?? 'Producto sin nombre';
        $talla = $_POST['talla'] ?? 'N/A';
        $color = $_POST['color'] ?? 'Ninguno';
        $cantidad = (int) ($_POST['cantidad'] ?? 1);
        $total = (float) ($_POST['total'] ?? 0);

        $stmt->bind_param("sssids", $producto, $talla, $color, $cantidad, $total, $metodo_pago);
        $compraRegistrada = $stmt->execute();
    }
    
    // Diseño de la pantalla de éxito
    if ($compraRegistrada) {
        echo "<div style='font-family: Arial, sans-serif; text-align: center; margin-top: 100px;'>";
        echo "<h1 style='color: #28a745;'>¡Compra Exitosa!</h1>";
        echo "<p style='color: #555; font-size: 18px;'>Tu pedido ha sido registrado correctamente.</p>";
        echo "<br>";
        // Botón para regresar al inicio
        echo "<a href='menu2.html' style='background-color: #0077b6; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; font-size: 16px; transition: 0.3s;'>Regresar</a>";
        echo "</div>";
    } else {
        echo "<h1 style='color: red; text-align: center;'>Error al procesar la compra</h1>";
    }
    
    $stmt->close();
}

$conexion->close();
?>