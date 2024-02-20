<?php

class HomeController
{
    private $productoModel;

    private $renderer;

    public function __construct($productoModel, $renderer) {
        $this->productoModel = $productoModel;
        $this->renderer = $renderer;
    }


    public function mostrar(){
        Logger::info('Me muestro');
        $producto = $this->productoModel->traerStock();
        $data=[
            'productos'=>$producto
        ];
        $this->renderer->render('home', $data);
    }
    public function descontarStock(){
        Logger::info('Estamos adentro.');
        $cantidadADescontar = $_POST['stock'];
        $nombre = $_POST['nombre'];
        $this->productoModel->descontarStock($nombre, $cantidadADescontar);
    }

    public function probando(){
        Logger::info('Probaste. Y te gustó');
    }
}