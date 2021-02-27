<?php

require 'vendor/autoload.php';
require 'ClassCliente.php';

class ClienteTest extends \PHPUnit\Framework\TestCase{
    
    
    public function testDarAlta(){

        $servername = "192.168.31.53";
        $username = "equipob";
        $password = "Equipob.1";
        $dbname = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
          die("Error de conexión: " . $conn->connect_error);
        }

        //Primera tanda

        //Primero calculo cuantas lineas hay en la tabla

        $sqlPrueba = "select * from Clientes;";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $clientesAntes = $resultado->num_rows;
          


        $clienteNuevo = new Cliente("prueba","prueba","prueba","prueba","micorreo@gmail.com");

        $clienteNuevo->darAlta($conn);

        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $clientesDespues = $resultado->num_rows;


        $this->assertEquals($clientesAntes+1,$clientesDespues,"El cliente se da de alta correctamente");

        //Segunda tanda
        $sqlPrueba = "select * from Clientes where dni like 'prueba';";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $numeroFilas = $resultado->num_rows;

        $this->assertEquals(1,$numeroFilas,"El cliente se da de alta correctamente, 2a prueba, y no se repiten filas");

        $conn->close();

        
    }
    
    
  
}
