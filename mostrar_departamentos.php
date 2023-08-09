<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM departamentos";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['nombre'] . '</td>';
        echo '<td>' . $row['descripcion'] . '</td>';
        echo '<td>' . $row['comentarios'] . '</td>';
        echo '<td><button class="eliminar" data-id="' . $row['id'] . '"><i class="fi fi-rr-trash"></i></button></td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="4">No se encontraron departamentos.</td></tr>';
}
$conn->close();
?>
