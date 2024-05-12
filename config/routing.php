<?php
// Default route when no specific path is provided or just the base URL
use Empresa\App\Core\Router;

$router = new Router();
//pagina principal
$router->add('', ['controller' => 'Index', 'action' => 'index']);
$router->add('index.php', ['controller' => 'Index', 'action' => 'index']);
//$router->add('articulo/listar', ['controller' => 'Articulo', 'action' => 'listar']);
//http: //localhost/mvccomposer/index.php/auto/nuevo
//autos
$router->add('index.php/autos/nuevo', ['controller' => 'Auto', 'action' => 'nuevo']);
$router->add('index.php/autos/crear', ['controller' => 'Auto', 'action' => 'crear']);
$router->add('index.php/autos/listar', ['controller' => 'Auto', 'action' => 'listar']);
