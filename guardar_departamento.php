<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['nombre']) && isset($_POST['descripcion'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : '';
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Error al conectar a la base de datos: " . $conn->connect_error);
        }
        
        $nombre = $conn->real_escape_string($nombre);
        $descripcion = $conn->real_escape_string($descripcion);
        $comentarios = $conn->real_escape_string($comentarios);
        $sql = "INSERT INTO departamentos (nombre, descripcion, comentarios) VALUES ('$nombre', '$descripcion', '$comentarios')";

        if ($conn->query($sql) === true) {
            $response = array('success' => true, 'message' => 'Departamento guardado exitosamente');
        } else {
            $response = array('success' => false, 'message' => 'Error al guardar el departamento: ' . $conn->error);
        }

        $conn->close();

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array('success' => false, 'message' => 'Datos del formulario incompletos');
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>
