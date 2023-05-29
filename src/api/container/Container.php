<?php

namespace Api;

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/container/TContainer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/api/Router.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/logger/Logger.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/api/Request.php';

use Logger\Logger;

class Container {
    use \TContainer;

    public function __construct() {
        $this->objects = [
            Router::class => fn() => new Router(new Logger(), new Request())
        ];
    }
}