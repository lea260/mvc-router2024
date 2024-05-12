<?php

declare(strict_types=1);

namespace Empresa\App\Models;


use Empresa\App\libs\Spdo;

use PDOException;

class Articulo
{
    private $id;
    private $codigo;
    private $descripcion;
    private $precio;
    private $fecha;

    public function __construct()
    {
        //parent::__construct();
    }

    public function listar()
    {
        //define un arreglo en php
        //$items = array();
        $items = [];
        $pdo = Spdo::singleton();
        $query = null;
        try {
            //$urlDefecto = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a3f093956%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a3f093956%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22106.6640625%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
            //$urlDefecto = constant('URL') . 'public/imagenes/articulos/imagenDefecto.svg';
            $query      = $pdo->query('SELECT id_productos, codigo,descripcion,precio,fecha FROM productos');
            while ($row = $query->fetch()) {
                $item              = new Articulo();
                $item->id          = $row['id_productos'];
                $item->codigo      = $row['codigo'];
                $item->descripcion = $row['descripcion'];
                $item->precio      = $row['precio'];
                $item->fecha       = $row['fecha'];

                //$item->url = isset($row['url']) ? $row['url'] : $urlDefecto;
                $items[] =  $item;
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        } finally {
            Spdo::cerrar();
            $query = null;
        }
    }


    public function getId()
    {
        return $this->id;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getFecha()
    {
        return $this->fecha;
    }
}
