<?php

namespace Empresa\App\Controllers;

use Empresa\App\Core\Controller;
use Empresa\App\Models\Auto;

class AutoController extends Controller
{
    public function index()
    {
        echo 'Welcome to the Home Page!';
    }
    public function nuevo()
    {
        //var_dump($_GET);
        //formulario de autos
        $this->render('autos/nuevo');
    }
    public function crear()
    {
        $mensaje = "";
        try {
            //code...

            $marca = $_POST['marca'] ?? '';
            $modelo = $_POST['modelo'] ?? '';
            $fechaCompra = $_POST['fecha_compra'] ?? '';
            // Crear instancia de Auto
            $auto = new Auto($marca, $modelo, $fechaCompra);

            // Insertar en la base de datos
            if ($auto->insertar()) {
                $mensaje = "El auto ha sido registrado con éxito.";
            } else {
                $mensaje = "Error al registrar el auto.";
            }
            $this->render('autos/crear', ["mensaje" => $mensaje]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function listar()
    {
        try {
            $autos = Auto::listar();
            $this->render('autos/listar', ["autos" => $autos]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
