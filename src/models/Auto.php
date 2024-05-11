<?php

namespace Empresa\App\Models;

use Conexion;
use PDO;

// Incluir la clase Conexion

class Auto
{
    // Constructor de promoción de propiedades
    public function __construct(
        public string $marca,
        public string $modelo,
        public string $fechaCompra,
        public ?int $id = null,
    ) {
    }

    // Método para insertar un nuevo auto en la base de datos
    public function insertar(): bool
    {
        $pdo = Conexion::getPDOConnection();
        $sql = "INSERT INTO LanzamientosModelos (Marca, Modelo, Fecha_Compra) VALUES (:marca, :modelo, :fechaCompra)";
        $stmt = $pdo->prepare($sql);

        // Vincular parámetros
        $stmt->bindParam(':marca', $this->marca, PDO::PARAM_STR);
        $stmt->bindParam(':modelo', $this->modelo, PDO::PARAM_STR);
        $stmt->bindParam(':fechaCompra', $this->fechaCompra, PDO::PARAM_STR);

        return $stmt->execute();
    }
}
