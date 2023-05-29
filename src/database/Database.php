<?php

namespace Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use PDO;

class Database {
    private static PDO $pdo;

    public function get(): PDO {
        if (!isset(self::$pdo)) {
            $pdo = self::$pdo = new PDO(
                'mysql:host=' . Config::HOST . ';dbname=' . Config::DATABASE,
                Config::USERNAME,
                Config::PASSWORD 
            );
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return self::$pdo;
    }
}