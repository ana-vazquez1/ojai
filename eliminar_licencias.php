<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$response = array();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM licencias WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
        $response['redirect'] = 'licencias.html'; 
    } else {
        $response['success'] = false;
        $response['error_message'] = "Error al eliminar la licencia: " . $conn->error;
    }
} else {
    $response['success'] = false;
    $response['error_message'] = "No se proporcionó el ID de la licencia.";
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>