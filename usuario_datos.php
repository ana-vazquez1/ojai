<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $data['nombre'], $data['correo'], $data['contraseña']);

if ($stmt->execute()) {
    echo json_encode(array("message" => "Datos guardados con éxito."));
} else {
    echo json_encode(array("error" => "Error al guardar los datos."));
}

$stmt->close();
$conn->close();
?>
