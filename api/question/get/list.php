<?php

require __DIR__ . '/../../../vendor/autoload.php';

use function Api\getRouter;

getRouter()->handle(fn () => (new Question\Container())->get(Question\Controller::class)->list($_GET), ["GET"]);
