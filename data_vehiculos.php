<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM vehiculos WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $response = array("success" => true, "message" => "Vehículo eliminado correctamente");
        } else {
            $response = array("success" => false, "message" => "Error al eliminar el vehículo: " . $conn->error);
        }
    } else {
        $response = array("success" => false, "message" => "Se requiere el ID del vehículo para eliminarlo");
    }
} else {
    $response = array("success" => false, "message" => "Método no permitido");
}

$conn->close();

header("Content-type: application/json");
echo json_encode($response);
?>
