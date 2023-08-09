<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

$sql = "SELECT id, nombre, direccion, telefono, descripcion, comentarios FROM sucursales";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sucursales = array();

    while ($row = $result->fetch_assoc()) {
        $sucursales[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($sucursales);
} else {
    echo "No se encontraron Sucursales.";
}

$conn->close();
?>
