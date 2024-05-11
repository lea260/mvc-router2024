<?php

namespace Empresa\App\Controllers;

use Empresa\App\Core\Controller;

class AutoController extends Controller
{
    public function nuevo()
    {
        var_dump($_GET);
        echo 'Welcome to the Home Page!';
    }
}
