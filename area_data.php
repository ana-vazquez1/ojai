<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreArea = $_POST['nombreArea'];
    $descripcion = $_POST['descripcion'];
    $comentarios = $_POST['comentarios'];

    $conn = new mysqli('localhost', 'root', '', 'ojai');

    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }
    $sql = "INSERT INTO areas (area, descripcion, comentarios) VALUES ('$nombreArea', '$descripcion', '$comentarios')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: area.php?status=success");
        exit; 
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }

    $conn->close();
}
?>
