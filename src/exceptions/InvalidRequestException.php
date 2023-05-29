<?php

namespace Api;

class InvalidRequestException extends \Exception {
    public function __construct(int $code, string $message = "") {
        parent::__construct($message, $code);
    }
}