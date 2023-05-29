<?php

namespace Database;
use Logger\Logger;

require_once __DIR__ . '/../../../vendor/autoload.php';

class Container {
    use \TContainer;

    public function __construct() {
        $this->objects = [
            Handler::class => fn() => new Handler(new Database(), new Logger())
        ];
    }
}