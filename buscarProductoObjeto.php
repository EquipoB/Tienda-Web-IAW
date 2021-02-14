<?php

require './ClassProducto.php';

// Variables 
$servername = "192.168.31.53";
$username = "equipob";
$password = "Equipob.1";
$dbname = "pruebas";
$tipoBusqueda = $_POST["radio"];
$busqueda = $_POST["busqueda"];

echo "<p> Se ha buscado en la web " .$busqueda. " con el parametro de busqueda: " .$tipoBusqueda. "</p>";

// Establecer conexión con la base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión

if ($conn->connect_error) {

    die("Error de conexión: " . $conn->connect_error);

}
//Buscar el cliente

Producto::buscarproductos($busqueda,$tipoBusqueda,$conn);

// Cerrar la conexion a la base de datos

$conn->close();
?>