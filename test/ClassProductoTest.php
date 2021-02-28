<?php


require '/home/garciafuentes/Tienda-Web-IAW/vendor/autoload.php';
require '/home/garciafuentes/Tienda-Web-IAW/ClassCliente.php';

class ClienteTest extends \PHPUnit\Framework\TestCase
{


    public function BuscarProductosTest()
    {

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

        $sqlPrueba = "select * from productos;";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $clientesAntes = $resultado->num_rows;


        $clienteNuevo = new Producto("prueba1", "prueba1", "prueba1", "prueba1");

        $clienteNuevo->darAlta($conn);

        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos

        $clientesDespues = $resultado->num_rows;


        $this->assertEquals($clientesAntes + 1, $clientesDespues, "El producto se da de alta correctamente");

        //Segunda tanda

        $sqlPrueba = "select * from productos where precio like 'prueba1';";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $numeroFilas = $resultado->num_rows;

        $this->assertEquals(1, $numeroFilas, "El producto se da de alta correctamente, 2a prueba, y no se repiten filas");

        $conn->close();


    }


}
