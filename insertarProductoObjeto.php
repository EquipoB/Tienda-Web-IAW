<?php

require './ClassProducto.php';

// Variables 
$servername = "192.168.31.53";
$username = "equipob";
$password = "Equipob.1";
$dbname = "pruebas";
$CodProducto = $_POST["cod"];
$Descripcion = $_POST["desc"];
$Precio = $_POST["prec"];
$Stock = $_POST["stock"];

echo "<p>El producto insertado tiene el código " .$CodProducto. " , la descripci&oacuten " .$Descripcion. " y el Precio " .$Precio. " y el Stock es " .$Stock. "</p>";

// Establecer conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

//Creamos un objeto cliente y le pedimos el alta.

$productoNuevo = new Producto($CodProducto,$Descripcion,$Precio,$Stock);

$productoNuevo->insertarproducto($conn);

// Cerrar la conexion a la base de datos
$conn->close();
?>