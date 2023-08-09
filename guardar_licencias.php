<?php
$host = 'localhost';
$db = 'ojai';
$user = 'root';
$pass = '';

$conexion = new mysqli($host, $user, $pass, $db);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombreEmpleado = $_POST['nombreEmpleado'];
$numeroLicencia = $_POST['numeroLicencia'];
$tipoLicencia = $_POST['tipoLicencia'];
$fechaVigencia = $_POST['fechaVigencia'];
$permanente = isset($_POST['permanente']) ? 1 : 0;

$fechaVigencia = date("Y-m-d", strtotime($fechaVigencia));
$fechaVigencia = $conexion->real_escape_string($fechaVigencia);

$sql = "INSERT INTO licencias (nombreEmpleado, numeroLicencia, tipoLicencia, fechaVigencia, permanente) VALUES (?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssi", $nombreEmpleado, $numeroLicencia, $tipoLicencia, $fechaVigencia, $permanente);

if ($stmt->execute()) {
    header("Location: licencias.html");
    exit();
} else {
    echo "Error al guardar los datos: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
