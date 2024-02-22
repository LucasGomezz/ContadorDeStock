<?php
require_once 'helpers/Logger.php';
class ProductoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function traerStock()
    {
        $sql = 'SELECT * FROM producto';
        return $this->database->query($sql);
    }

    public function descontarStock($nombre, $cantidadADescontar)
    {
        $sql = 'SELECT stock FROM producto WHERE nombre LIKE "' . $nombre . '"';
        $resultado = $this->database->query($sql);

        if ($resultado && count($resultado) > 0) {

            $cantidadQueHay = $resultado[0]['stock'];
            if($cantidadQueHay >= $cantidadADescontar){
                $cantidadActual = $cantidadQueHay - $cantidadADescontar;

                $sql2 = 'UPDATE producto SET stock = ' . $cantidadActual . ' WHERE nombre LIKE "' . $nombre . '"';
                $this->database->execute($sql2);
            }
        }
    }

    public function sumarStock($nombre, $cantidadQueEntro)
    {
        $sql = 'SELECT stock FROM producto WHERE nombre LIKE "' . $nombre . '"';
        $resultado = $this->database->query($sql);

        $cantidadQueHay = $resultado[0]['stock'];
        $cantidadActual = $cantidadQueHay + $cantidadQueEntro;

        $sql2 = 'UPDATE producto SET stock = ' . $cantidadActual . ' WHERE nombre LIKE "' . $nombre . '"';
        $this->database->execute($sql2);
    }

    public function sumarNuevoProducto($nombre, $cantidadEnStock, $precio, $imagen){
        $sql = 'INSERT INTO producto (nombre, precio, stock, imagen) VALUES ("' . $nombre . '", "' . $precio . '", "' .  $cantidadEnStock . '", "' . $imagen . '")';
        $this->database->execute($sql);
    }

    public function eliminarProducto($id){
        $sql='DELETE FROM producto WHERE id = "'. $id . '"';
        $this->database->execute($sql);
    }

}