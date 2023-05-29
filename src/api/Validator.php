<?php

namespace Api;

require_once __DIR__ . '/../../vendor/autoload.php';

class Validator {
    public function validateBody(callable $callback): void {
        try {
            $callback();
        } catch (\InvalidArgumentException $exception) {
            throw new InvalidRequestException(400, $exception->getMessage());
        }
    }

    public function validateData(array $requirements, int $type): array {
        if($fileted = filter_input_array($type, $requirements)) {
            return $fileted;
        } else {
            throw new InvalidRequestException(400, 'Invalid data');
        }
    }
}