<?php
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$dni = $_POST["dni"];
$email = $_POST["email"];
$fecha = $_POST["fecha"];

echo "<p>El nombre es " .$nombre. " , los apellidos son " .$apellidos. " , el DNI es " .$dni. " , el email es " . $email . " y la fecha de nacimiento es " . $fecha . "</p>";

$servername = "192.168.31.53";
$username = "equipob";
$password = "Equipob.1";
$dbname = "pruebas";;

    $nombre = "'" .$nombre. "'";
    $apellidos = "'" .$apellidos. "'";
    $dni = "'" .$dni. "'";
    $email = "'" .$email. "'";
    $fecha = "'" .$fecha. "'";

// Comprobamos la conexion con la base de datos
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

//Creamos la sentencia
    $sentencia = "INSERT INTO clientes VALUES ($nombre , $apellidos , $dni , $email , $fecha)";

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
?>