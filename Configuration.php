<?php

session_start();

include_once('helpers/MySqlDatabase.php');
include_once("helpers/MustacheRender.php");
include_once('helpers/Router.php');
include_once('helpers/Logger.php');
include_once ('model/AdminModel.php');
include_once ('model/ProductoModel.php');
include_once('controller/AdminController.php');
include_once('controller/HomeController.php');
include_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once('helpers/Session.php');


class Configuration {
    private $configFile = 'config/config.ini';

    public function __construct() {
        //conectar($module, $this->getRouter());

    }



    public function getAdminController(){
        return new AdminController(
            new  AdminModel($this->getDatabase()),
            $this->getRenderer()
        );
    }




    public function getHomeController() {
        return new HomeController(
            new ProductoModel($this->getDatabase()),
            $this->getRenderer()
        );
    }


    private function getArrayConfig() {
        return parse_ini_file($this->configFile);
    }

    private function getRenderer() {
        return new MustacheRender('view/partial');
    }

    public function getDatabase() {
        $config = $this->getArrayConfig();
        return new MySqlDatabase(
            $config['servername'],
            $config['username'],
            $config['password'],
            $config['database']);
    }

    public function getRouter() {
        return new Router(
            $this,
            "getHomeController",
            "mostrar");
    }

}