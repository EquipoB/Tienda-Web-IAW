<?php

$codigo = $_POST["cod"];
$descripcion = $_POST["desc"];
$precio = $_POST["prec"];
$stock = $_POST["stock"];

echo "<p>El producto insertado tiene el código " .$codigo. " , la descripci&oacuten " .$descripcion. " y el precio " .$precio. " y el stock es " .$stock. "</p>";



$servername = "192.168.158.130";
$username = "php";
$password = "1234";
$dbname = "pruebas";

include 'funciones.php';
chgvar($precio);

if (is_numeric($codigo) and is_numeric($precio) and is_string($descripcion)) {
    $codigo = "'" .$codigo. "'";
    $descripcion = "'" .$descripcion. "'";
    $precio = "'" .$precio. "'";
    $stock = "'" .$stock. "'";
// Comprobamos la conexion con la base de datos
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
//Creamos la sentencia
    $sentencia = "INSERT INTO productos VALUES ($codigo , $descripcion , $precio)";

//Iniciamos la insercion de datos
    if (mysqli_query($conn, $sentencia)) {
        echo "Se ha añadido correctamente el producto";
        echo "<br>";
        echo "<a href=index.html>Volver al índice</a>";
    } else {
        echo "Error: " . $sentencia . "<br>" . mysqli_error($conn);
        echo "<br>";
        echo "<a href=index.html>Volver al índice</a>";
    }

    mysqli_close($conn);
}
?>



