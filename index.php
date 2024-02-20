<?php
include_once('Configuration.php');
if(!isset($_GET['module'])){
    $configuration = new Configuration('User');
}else {
    $configuration = new Configuration($_GET['module']);
}


$router = $configuration->getRouter();

$module = $_GET['module'] ?? 'home';
$method = $_GET['action'] ?? 'mostrar';
Logger::info($method);

$router->route($module, $method);
