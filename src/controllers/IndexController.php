<?php

namespace Empresa\App\Controllers;

use Empresa\App\Core\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->render('index/index');
    }
}
