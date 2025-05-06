<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["mensaje" => "Registro exitoso"]);
    } else {
        echo json_encode(["error" => "Error: " . $conn->error]);
    }
}

$conn->close();
?>
