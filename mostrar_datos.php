<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT *, CASE 
            WHEN fechaVigencia < CURDATE() THEN 'Caducada'
            WHEN fechaVigencia <= DATE_ADD(CURDATE(), INTERVAL 1 YEAR) THEN 'Próxima'
            ELSE 'Más de un año'
        END as estadoLicencia
        FROM licencias";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
echo json_encode($data);
?>
