<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $comentarios = $_POST["comentarios"];

    $stmt = $conn->prepare("INSERT INTO taller (nombre, descripcion, comentarios) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $descripcion, $comentarios);

    if ($stmt->execute()) {
        header("Location: taller.html");
        exit;
    } else {
        echo "Error al guardar los datos: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
