<?php
$mysqli = new mysqli("localhost", "root", "", "pagina");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
?>