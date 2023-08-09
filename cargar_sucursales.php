<?php
$conn = new mysqli('localhost', 'root', '', 'ojai');

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

$sql = "SELECT * FROM sucursales";
$result = $conn->query($sql);
$sucursales = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sucursales[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($sucursales);
?>
