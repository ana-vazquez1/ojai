<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$sql = "SELECT * FROM taller";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $taller = array();
    while ($row = $result->fetch_assoc()) {
        $taller[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($taller);
} else {
    echo "No se encontraron talleres.";
}

$conn->close();
?>
