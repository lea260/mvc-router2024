<?php
require_once __DIR__ . '/vendor/autoload.php';

use Empresa\App\Core\Router;

$router = new Router();
require_once __DIR__ . '/config/routing.php';
// Dispatch the current URL
$url = $_SERVER['REQUEST_URI'];
$router->dispatch($url);
