<?php
$parametro = $_POST["param"];
$busqueda = $_POST["busqueda"];

echo "<p>Se ha buscado en la web " .$busqueda. " con el par&aacutemetro de b&uacutesqueda " .$parametro. "</p>";

$servername = "192.168.31.53";
$username = "equipob";
$password = "Equipob.1";
$dbname = "pruebas";

if (is_string($parametro) and is_string($busqueda)) {

// Comprobacion de la conexion con la base de datos
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sentencia = "SELECT * FROM clientes WHERE " . $parametro . " LIKE '%" .$busqueda. "%'";
    $resultado = mysqli_query($conn, $sentencia);

    if (mysqli_num_rows($resultado) > 0) {

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo " - Nombre : " . $row["nombre"] . " - Apellidos: " . $row["apellidos"] . " - DNI: " . $row["dni"] .
                 " - Email: " . $row["email"] . " - Fecha de nacimiento: " . $row["fecha_de_nacimiento"] .
                 "<br>";
        }
    } else {
        echo "0 resultados";
    }
    echo "<br>";
    echo "<a href=index.html>Volver al índice</a>";
    mysqli_close($conn);
}
?>
