<?php

require './ClassCliente.php';

// Variables 
$servername = "192.168.31.53";
$username = "equipob";
$password = "Equipob.1";
$dbname = "pruebas";
/*$dni = $_POST["fdni"];
$fnom = $_POST["fnom"];
$fape = $_POST["fape"];
$fmail = $_POST["fmail"];
$fdate = $_POST["fdate"];
*/
$dni = "76112274M";
$fnom = "Horumos";
$fape = "Clong Yoink";
$fmail = "dp.pepe0402@gmail.com";
$fdate = "1998-02-05";


// Establecer conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

//Creamos un objeto cliente y le pedimos el alta.


$clienteNuevo = new Cliente($fnom,$fape,$dni,$fmail,$fdate);

$clienteNuevo->darAlta($conn);


// Cerrar la conexion a la base de datos
$conn->close();


?>
