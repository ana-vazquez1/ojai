<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    $conexion = new mysqli("localhost", "root", "", "ojai");

    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }
    $sql = "INSERT INTO usuarios (nombre, email, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: usuarios.html");
        exit;
    } else {
        echo "Error al guardar los datos: " . $conexion->error;
    }
    $conexion->close();
}
?>
