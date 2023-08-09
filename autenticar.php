<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$email = $_POST['email'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND contraseña = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    header("Location: licencias.html");
    exit();
} else {
    header("Location: index.html");
    exit();
}
// Cerrar la conexión
$conn->close();
