<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ojai";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $id = $conn->real_escape_string($id);

    $sql = "DELETE FROM sucursales WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("success" => true, "message" => "Sucursal eliminada correctamente."));
    } else {
        echo json_encode(array("success" => false, "message" => "Error al eliminar la sucursal: " . $conn->error));
    }

    $conn->close();
} else {
    echo json_encode(array("success" => false, "message" => "ID de la sucursal no especificado."));
}
?>
