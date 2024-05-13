<?php

declare(strict_types=1);

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
            $fechaCompra = $_POST['fechaCompra'] ?? '';
            // Crear instancia de Auto
            $auto = new Auto($marca, $modelo, $fechaCompra);

            // Insertar en la base de datos
            if ($auto->insertar()) {
                $mensaje = "El auto ha sido registrado con éxito.";
            } else {
                $mensaje = "Error al registrar el auto.";
            }
            $this->render('autos/mensaje', ["mensaje" => $mensaje]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function modificar()
    {
        $mensaje = "";
        try {
            //code...

            $id = (int) $_POST['id'] ?? '';
            $marca = $_POST['marca'] ?? '';
            $modelo = $_POST['modelo'] ?? '';
            $fechaCompra = $_POST['fechaCompra'] ?? '';
            // Crear instancia de Auto
            $auto = new Auto(
                id: $id,
                marca: $marca,
                modelo: $modelo,
                fechaCompra: $fechaCompra
            );

            // Insertar en la base de datos
            if ($auto->modificar()) {
                $mensaje = "El auto ha sido modificado con éxito.";
            } else {
                $mensaje = "Error al modificar el auto.";
            }
            $this->render('autos/mensaje', ["mensaje" => $mensaje]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function borrar()
    {
        $mensaje = "";
        try {
            //code...

            $id = (int) $_POST['id'] ?? '';
            // Crear instancia de Auto
            // Insertar en la base de datos
            if (Auto::borrar($id)) {
                $mensaje = "El auto ha sido borrado con éxito.";
            } else {
                $mensaje = "Error al borrar el auto.";
            }
            $this->render('autos/mensaje', ["mensaje" => $mensaje]);
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

    public function editar()
    {

        try {
            //code...
            $id = (int)$_GET['id'] ?? '';
            $auto = Auto::obtenerPorId($id);
            // Insertar en la base de datos
            $this->render('autos/editar', ["auto" => $auto]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
