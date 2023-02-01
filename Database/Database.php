<?php

namespace App\Database;
require '../vendor/autoload.php';

use Dotenv\Dotenv;
use PDO;
use PDOException;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

print_r($_ENV);

class Database
{
    private static $instance;
    private $conn;

    private function __construct()
    {
        try {
            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->load();
            $this->conn = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function close()
    {
        $this->conn = null;
    }
}
