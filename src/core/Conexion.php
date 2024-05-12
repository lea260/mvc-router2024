<?php

declare(strict_types=1);

namespace Empresa\App\Core;

use PDO;
use PDOException;


class Conexion
{
    private static $instancia = null;
    // Método estático para obtener la conexión PDO
    public static function getPDOConnection(): PDO
    {
        // Incluir el puerto en el DSN
        $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            self::$instancia = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
            return self::$instancia;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
