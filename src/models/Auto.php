<?php

namespace Leandro\App\Models;

class Auto
{

    private $descripcion;
    public function __construct($descripcion = "descripcion")
    {
        $this->descripcion = $descripcion;
    }

    public function info()
    {
        echo "informacion auto";
    }
    public function listarAuto()
    {
        # code...
    }
}
