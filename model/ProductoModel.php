<?php
require_once 'helpers/Logger.php';
class ProductoModel
{
    private $database;

    public function __construct($database){$this->database = $database;}

    public function traerStock(){
        $sql = 'SELECT * FROM producto';
        return $this->database->query($sql);
    }

    public function descontarStock($nombre, $cantidadADescontar){
        Logger::info('Este es un mensaje de información.');
        $sql = 'SELECT stock FROM producto WHERE nombre LIKE "' . $nombre . '"';
        $resultado = $this->database->query($sql);
        $fila = $resultado->fetch_assoc();
        $cantidadQueHay = $fila['stock'];
        $cantidadActual = $cantidadQueHay - $cantidadADescontar;
        $sql2 = 'UPDATE producto SET stock = ' . $cantidadActual . ' WHERE nombre LIKE "' . $nombre . '"';
        $this->database->execute($sql2);
    }

}