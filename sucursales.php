<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreSucursal = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $descripcion = $_POST['descripcion'];
    $comentarios = $_POST['comentarios'];

    $conn = new mysqli('localhost', 'root', '', 'ojai');

    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $sql = "INSERT INTO sucursales (nombre, direccion, telefono, descripcion, comentarios) VALUES ('$nombreSucursal', '$direccion', '$telefono', '$descripcion', '$comentarios')";

    if ($conn->query($sql) === TRUE) {
        header("Location: sucursales.html");
        exit;
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }

    $conn->close();
}
?>
