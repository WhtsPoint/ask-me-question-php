<?php

namespace Database;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Logger\ILogger;

class Handler implements IHandler {
    public function __construct(
        private Database $database,
        private ILogger $logger
    ) {}

    public function query(string $statement, ?array $params): array {
        $pdo = $this->database->get();
        $query = $pdo->prepare($statement);
        $query->execute($params);
        
        $error = $query->errorInfo();
        if ($error[1]) {
            $this->logger->writeError("Bad SQL request: " . $statement);
        }

        return $query->fetchAll();
    }
}