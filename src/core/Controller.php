<?php

namespace Empresa\App\Core;

class Controller
{

    public function __construct($a = "")
    {
    }

    public function render(string $temp, array $ar = []): void
    {
        require 'views' . $temp . "php";
    }
}
