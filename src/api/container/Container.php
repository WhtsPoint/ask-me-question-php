<?php

namespace Api;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Logger\Logger;

class Container {
    use \TContainer;

    public function __construct() {
        $this->objects = [
            Router::class => fn() => new Router(new Logger(), new Request(), new Settings())
        ];
    }
}