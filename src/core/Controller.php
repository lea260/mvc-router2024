<?php

declare(strict_types=1);

namespace Empresa\App\Core;

class Controller
{

    public function __construct($a = "")
    {
    }

    public function render(string $temp, array $arr = []): void
    {
        extract($arr);
        require 'src/views/' . $temp . ".php";
    }
}
