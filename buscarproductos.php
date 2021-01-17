<?php

$parametro = $_POST["radio"];
$busqueda = $_POST["busq"];

echo "<p>Se ha buscado en la web " .$busqueda. " con el par&aacutemetro de b&uacutesqueda " .$parametro. "</p>";


$servername = "192.168.158.130";
$username = "php";
$password = "1234";
$dbname = "pruebas";

if (is_string($parametro) and is_string($busqueda)) {


// Comprobacion de la conexion con la base de datos
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sentencia = "SELECT * FROM productos WHERE " . $parametro . " LIKE '%" .$busqueda. "%'";
    $resultado = mysqli_query($conn, $sentencia);


    if (mysqli_num_rows($resultado) > 0) {

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "Codigo : " . $row["cod"] . " - Descripcion: " . $row["descripcion"] . " - Precio : " . $row["precio"] . "<br>";
        }
    } else {
        echo "0 resultados";
    }
    echo "<br>";
    echo "<a href=index.html>Volver al índice</a>";
    mysqli_close($conn);
}
?>
