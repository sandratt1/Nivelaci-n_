<?php
$host = "localhost";
$usuario = "root";  // Usuario de MySQL por defecto en XAMPP
$password = "";  // Contraseña vacía por defecto en XAMPP
$base_datos = "mi_app";

$conn = new mysqli($host, $usuario, $password, $base_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

echo "Conexión exitosa";
?>
