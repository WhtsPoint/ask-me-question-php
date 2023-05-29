<?php

namespace Api;

require_once __DIR__ . '/../../vendor/autoload.php';

class Request {
    public function validateMethod(array $allowed) {
        if (!in_array($_SERVER['REQUEST_METHOD'], $allowed)) {
            throw new InvalidRequestException(405, 'The request method is not allowed');
        }
    }
}