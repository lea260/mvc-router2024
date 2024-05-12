<?php

namespace Empresa\App\Models;

use Conexion;
use PDO;
use PDOException;

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

    public static function listar(): array
    {
        $pdo = null;
        $stmt = null;
        try {
            $pdo = Conexion::getPDOConnection();
            $sql = "SELECT * FROM LanzamientosModelos";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Auto');
        } catch (PDOException $e) {
            error_log("Error al obtener autos: " . $e->getMessage());
            return [];
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }

    public function actualizar(): bool
    {
        $pdo = null;
        $stmt = null;
        try {
            $pdo = Conexion::getPDOConnection();
            $sql = "UPDATE LanzamientosModelos SET Marca = :marca, Modelo = :modelo, Fecha_Compra = :fechaCompra WHERE ID = :id";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':marca', $this->marca, PDO::PARAM_STR);
            $stmt->bindParam(':modelo', $this->modelo, PDO::PARAM_STR);
            $stmt->bindParam(':fechaCompra', $this->fechaCompra, PDO::PARAM_STR);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al actualizar auto: " . $e->getMessage());
            return false;
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }

    public function eliminar(): bool
    {
        $pdo = null;
        $stmt = null;
        try {
            $pdo = Conexion::getPDOConnection();
            $sql = "DELETE FROM LanzamientosModelos WHERE ID = :id";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al eliminar auto: " . $e->getMessage());
            return false;
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }
}
