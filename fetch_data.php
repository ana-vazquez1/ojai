<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$sql = "SELECT id, area, descripcion, comentarios FROM areas ORDER BY area";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['area'] . '</td>';
        echo '<td>' . $row['descripcion'] . '</td>';
        echo '<td>' . $row['comentarios'] . '</td>';
        echo '<td>';
        echo '<button class="delete-button" onclick="deleteArea(' . $row['id'] . ')"><i class="fi fi-rr-trash"></i></button>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="4">No se encontraron áreas.</td></tr>';
}

$conn->close();
?>
