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

        $producto = $this->productoModel->traerStock();
        $data=[
            'productos'=>$producto
        ];
        $this->renderer->render('home', $data);
    }
    public function descontarStock(){
        $cantidadADescontar = (int)$_POST['descontarStock'];
        $nombre = $_POST['nombre'];
        $this->productoModel->descontarStock($nombre, $cantidadADescontar);
        $producto = $this->productoModel->traerStock();
        $data=[
            'productos'=>$producto
        ];
        $this->renderer->render('home', $data);
    }

    public function sumarStock(){
        $cantidadASumar = (int)$_POST['sumarStock'];
        $nombre = $_POST['nombre'];
        $this->productoModel->sumarStock($nombre, $cantidadASumar);
        $producto = $this->productoModel->traerStock();
        $data=[
            'productos'=>$producto
        ];
        $this->renderer->render('home', $data);
    }

    public function agregarProducto(){
        $imagen_ruta="../public/images/generica.png";
        if(isset($_FILES["imagenProducto"]) && $_FILES["imagenProducto"]["error"] === UPLOAD_ERR_OK){
            $imagen= $_FILES["imagenProducto"]["name"];
            $loc_temp = $_FILES["imagenProducto"]["tmp_name"];
            $imagen_ruta = "public/images/" . $imagen;
            move_uploaded_file($loc_temp, $imagen_ruta);
        };
        $nombre = $_POST['nombreDelProducto'];
        $cantidadEnStock = $_POST['cantidadProducto'];
        $precio = $_POST['precio'];
        $imagen= $imagen_ruta;
        $this->productoModel->sumarNuevoProducto($nombre, $cantidadEnStock, $precio, $imagen);
        $producto = $this->productoModel->traerStock();
        $data=[
            'productos'=>$producto
        ];
        $this->renderer->render('home', $data);
    }

    public function eliminarProducto(){
        $idProductoEliminar = $_POST['id'];
        $this->productoModel->eliminarProducto($idProductoEliminar);
        $producto = $this->productoModel->traerStock();
        $data=[
            'productos'=>$producto
        ];
        $this->renderer->render('home', $data);
    }

}