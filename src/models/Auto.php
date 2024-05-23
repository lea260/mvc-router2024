<?php

declare(strict_types=1);

namespace Empresa\App\Models;


use Empresa\App\Core\Conexion;
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
        $pdo = null;
        $stmt = null;
        try {
            $pdo = Conexion::getPDOConnection();
            $sql = "INSERT INTO LanzamientosModelos (Marca, Modelo, Fecha_Compra) VALUES (:marca, :modelo, :fechaCompra)";
            $stmt = $pdo->prepare($sql);

            // Vincular parámetros
            $stmt->bindParam(':marca', $this->marca, PDO::PARAM_STR);
            $stmt->bindParam(':modelo', $this->modelo, PDO::PARAM_STR);
            $stmt->bindParam(':fechaCompra', $this->fechaCompra, PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al obtener autos: " . $e->getMessage());
            return [];
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }

    public static function arrayToAuto($row): Auto
    {
        $auto = new Auto(
            id: $row['id'],
            marca: $row['Marca'],
            modelo: $row['Modelo'],
            fechaCompra: $row['Fecha_Compra'],
        );
        return $auto;
    }



    public static function listar(): array
    {
        $pdo = null;
        $stmt = null;
        try {
            $pdo = Conexion::getPDOConnection();
            $sql = "SELECT id, Marca, Modelo, Fecha_Compra FROM lanzamientosmodelos";
            $stmt = $pdo->query($sql);
            while ($row = $stmt->fetch()) {
                $auto = self::arrayToAuto($row);
                $autos[] = $auto;
            }
            //retornar los autos
            return $autos;
        } catch (PDOException $e) {
            error_log("Error al obtener autos: " . $e->getMessage());
            return [];
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }

    public static function obtenerPorId(int $id): ?Auto
    {
        $pdo = null;
        $stmt = null;
        try {
            $pdo = Conexion::getPDOConnection();
            $sql = "SELECT id, Marca, Modelo, Fecha_Compra FROM LanzamientosModelos WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Fetch the auto data
            $row = $stmt->fetch();
            if ($row) {
                $auto = self::arrayToAuto($row);
                return $auto;
            }
        } catch (PDOException $e) {
            error_log("Error al obtener auto: " . $e->getMessage());
            // Consider handling or re-throwing the exception depending on your error handling policy
        } finally {
            $stmt = null;
            $pdo = null;
            Conexion::cerrar();
        }
        return null;
    }

    public function modificar(): bool
    {
        $pdo = null;
        $stmt = null;
        try {
            $pdo = Conexion::getPDOConnection();
            $sql = "UPDATE LanzamientosModelos SET Marca=:marca, Modelo=:modelo, Fecha_Compra=:fechaCompra WHERE id=:id";
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

    public static function borrar($id): bool
    {
        $pdo = null;
        $stmt = null;
        try {
            $pdo = Conexion::getPDOConnection();
            $sql = "DELETE FROM LanzamientosModelos WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al eliminar auto: " . $e->getMessage());
            return false;
        } finally {
            $stmt = null;
            $pdo = null;
        }
    }

    //getters
    public function getMarca(): string
    {
        return $this->marca;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getFechaCompra(): string
    {
        return $this->fechaCompra;
    }
}
