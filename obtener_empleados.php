<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM empleados";

$result = $conn->query($sql);
$empleados = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $empleados[] = $row;
    }
}

$conn->close();

echo json_encode($empleados);
?>
