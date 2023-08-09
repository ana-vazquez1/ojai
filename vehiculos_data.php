<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "ojai"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $economico = $_POST["economico"];
    $nombre = $_POST["nombre"];
    $modelo = $_POST["modelo"];
    $placas = $_POST["placas"];
    $tipoPlaca = $_POST["tipoPlaca"];
    $conductor = $_POST["conductor"];
    $departamento = $_POST["departamento"];
    $cargoA = $_POST["cargoA"];
    $tipo = $_POST["tipo"];

    $sql = "INSERT INTO vehiculos (economico, nombre, modelo, placas, tipoPlaca, conductor, departamento, cargoA, tipo)
            VALUES ('$economico', '$nombre', '$modelo', '$placas', '$tipoPlaca', '$conductor', '$departamento', '$cargoA', '$tipo')";

    if ($conn->query($sql) === TRUE) {
        $response = array("success" => true, "message" => "Datos guardados correctamente.");
    } else {
        $response = array("success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error);
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
