<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojai";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT nombre, correo, contraseña FROM usuarios";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Usuarios</title>
</head>
<body>
    <div id="myForm">
        <h2>Agregar Usuarios</h2>
    </div>

    <table id="dataTable">
        <thead>
            <tr>
                <th width="30%">Nombre del Usuario</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th width="15%">Acciones</th>
            </tr>
        </thead>
        <tbody id="tablaTallerBody">
            <?php
            if ($result !== false && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["correo"] . "</td>";
                    echo "<td>" . $row["contraseña"] . "</td>";
                    echo "<td>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No se encontraron registros</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
