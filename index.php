<?php
include_once('Configuration.php');
//if(!isset($_GET['module'])){
//    $configuration = new Configuration('home');
//}else {
//    $configuration = new Configuration($_GET['module']);
//}
$configuration = new Configuration();
$router = $configuration->getRouter();


$module = $_GET['module'] ?? 'home';
$method = $_GET['action'] ?? 'mostrar';




$router->route($module, $method);
