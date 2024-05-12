<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/routing.php';


// Dispatch the current URL
// $url = $_SERVER['REQUEST_URI'];
$url = $_GET['r'] ?? "index.php";
$router->dispatch($url);
