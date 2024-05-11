<?php
// Default route when no specific path is provided or just the base URL
use Empresa\App\Core\Router;

$router = new Router();

$router->add(
    '',
    ['controller' => 'Index', 'action' => 'index']
);
$router->add('index.php', ['controller' => 'Index', 'action' => 'index']);
$router->add('articulo/listar', ['controller' => 'Articulo', 'action' => 'listar']);
//http: //localhost/mvccomposer/index.php/auto/nuevo
$router->add('/auto/nuevo', ['controller' => 'Auto', 'action' => 'nuevo']);
