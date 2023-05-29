<?php

namespace Database;
use Logger\Logger;

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/container/TContainer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/database/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/logger/Logger.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/database/handler/Handler.php';

class Container {
    use \TContainer;

    public function __construct() {
        $this->objects = [
            Handler::class => fn() => new Handler(new Database(), new Logger())
        ];
    }
}