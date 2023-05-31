<?php

namespace Question;

require_once __DIR__ . '/../../../../vendor/autoload.php';
 
use Database;
use Api;

class Container {
    use \TContainer;

    public function __construct() {
        $database = (new Database\Container())->get(Database\Handler::class);
        
        $this->objects = [
            Repository::class => fn() => new Repository($database, new Factory()),
            Controller::class => fn() => new Controller(
                $this->get(Repository::class),
                new Api\Validator(),
                new Serializer(),
                new Helper()
            )
        ];
    }
}