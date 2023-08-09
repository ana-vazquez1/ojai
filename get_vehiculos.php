<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id, economico, nombre, modelo, placas, tipoPlaca, conductor, departamento, cargoA, tipo FROM vehiculos ORDER BY economico";
$result = $conn->query($sql);

$vehiculos = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vehiculos[] = $row;
    }
}

$conn->close();

echo json_encode($vehiculos);
?>
