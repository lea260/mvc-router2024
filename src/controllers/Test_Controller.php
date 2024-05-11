<?php

use Empresa\App\Core\Controller;




class Test_Controller extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  //base+articulos
  public function index()
  {
    //$alumnos = $this->model->get();  
    $this->render('articulos/index');
  }


  public function hola($param = null)
  {

    $this->render('test/hola');
  } //end listar









}
