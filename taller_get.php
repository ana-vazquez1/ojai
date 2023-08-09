<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ojai";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$sql = "SELECT nombre, descripcion, comentarios, id FROM taller";

$resultado = $conn->query($sql);

$talleres = array();

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $talleres[] = $row;
    }
}
header('Content-Type: application/json');
echo json_encode($talleres);

$conn->close();
?>
