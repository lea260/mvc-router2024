<?php
require_once __DIR__ . '/vendor/autoload.php';

use Empresa\App\Core\Router;

$router = new Router();

// Default route when no specific path is provided or just the base URL
$router->add('', ['controller' => 'Index', 'action' => 'index']);
$router->add('index.php', ['controller' => 'Index', 'action' => 'index']);
$router->add('articulo/listar', ['controller' => 'Articulo', 'action' => 'listar']);
//http: //localhost/mvccomposer/index.php/auto/nuevo
$router->add('index.php/auto/nuevo', ['controller' => 'Auto', 'action' => 'nuevo']);
// Dispatch the current URL
$url = $_SERVER['REQUEST_URI'];
$router->dispatch($url);
