<?php

namespace Question;

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/container/TContainer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/database/container/Container.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/services/question/repository/Repository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/services/question/controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/services/question/factory/Factory.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/services/question/serializer/Serializer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/api/Validator.php';
 
use Database;
use Api;

class Container {
    use \TContainer;

    public function __construct() {
        $database = (new Database\Container())->get(Database\Handler::class);
        
        $this->objects = [
            Repository::class => fn() => new Repository($database, new Factory()),
            Controller::class => fn() => new Controller($this->get(Repository::class), new Api\Validator(), new Serializer())
        ];
    }
}