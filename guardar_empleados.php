<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$puesto = $_POST['puesto'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$curp = $_POST['curp'];
$rfc = $_POST['rfc'];

$sql = "INSERT INTO empleados (nombre, puesto, correo, telefono, curp, rfc) VALUES ('$nombre', '$puesto', '$correo', '$telefono', '$curp', '$rfc')";

if ($conn->query($sql) === TRUE) {
    header("Location: empleados.html");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
