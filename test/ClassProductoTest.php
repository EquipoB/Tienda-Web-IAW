<?php


require './vendor/autoload.php';
require 'ClassProducto.php';

class ProductoTest extends \PHPUnit\Framework\TestCase
{


    public function testProductoInsertar()
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
        $productoAntes = $resultado->num_rows;


        $productoNuevo = new Producto("9999", "prueba", "1234", "9999");

        $productoNuevo->insertarproducto($conn);

        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos

        $productoDespues = $resultado->num_rows;


        $this->assertEquals($productoAntes + 1, $productoDespues, "El producto se ha insertado correctamente");

        //Segunda tanda

        $sqlPrueba = "select * from productos where Descripcion like 'prueba';";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $numeroFilas = $resultado->num_rows;

        $this->assertEquals(1, $numeroFilas, "El producto se ha insertado correctamente, 2a prueba, y no se repiten filas");

        $conn->close();


    }

    public function testProductoBuscar()
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

        //Aqui vamos a crear el producto e insertarlo
        $productoNuevo = new Producto("9998", "buscar", "1234", "9999");

        $productoNuevo->insertarproducto($conn);

        //Primer test

        $buscarproducto = Producto::buscarproductos("buscar", "Descripcion",$conn);


        $this->assertEquals(1, count($buscarproducto), "Se ha encontrado el producto correctamente");

        //Segundo test

        $buscarproducto = Producto::buscarproductos("ajfkkabfkf", "Descripcion",$conn);

        $this->assertEquals(0, count($buscarproducto), "Se ha comprobado que al buscar algo random efectivamente no encuentra nada");

        $conn->close();


    }

}