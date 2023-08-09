<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM departamentos WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        // Éxito
        echo "Registro eliminado exitosamente.";
    } else {
        // Error
        echo "Error al eliminar el registro: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
