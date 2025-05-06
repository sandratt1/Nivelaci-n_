<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT id, nombre, contraseña FROM usuario WHERE correo = '$correo'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        
        if (password_verify($contraseña, $fila['contraseña'])) {
            echo json_encode([
                "mensaje" => "Inicio de sesión exitoso",
                "usuario" => ["id" => $fila["id"], "nombre" => $fila["nombre"]]
            ]);
        } else {
            echo json_encode(["error" => "Contraseña incorrecta"]);
        }
    } else {
        echo json_encode(["error" => "Usuario no encontrado"]);
    }
}

$conn->close();
?>
