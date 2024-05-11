<?php

namespace Leandro\mvc\libs;

use PDO;
use PDOException;

class Database
{
    private $host;
    private $port;
    private $db;
    private $charset;
    private $password;
    private $user;

    public function __construct()
    {
        $this->host     = constant('HOST');
        $this->port     = constant('PORT_DB');
        $this->db       = constant('DB');
        $this->user     = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset  = constant('CHARSET');
    }

    public function connect()
    {
        try {
            $connection = "mysql:host={$this->host};port={$this->port};dbname={$this->db};charset={$this->charset}";
            $options    = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}
