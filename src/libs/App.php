<?php

namespace Empresa\App\libs;

class App
{
    public static function main()
    {
        //echo "llama al main si dd";
        $c              = $_GET['c'] ?? "index";
        $m              = $_GET['m'] ?? "index";
        $con            = ucfirst($c) . "_Controller";
        $controllerPath = 'src/controller/' . $con . ".php";
        require_once $controllerPath;
        $controllerM= 
        $controller = new $con();
        $controller->{$m}();
    }
}
