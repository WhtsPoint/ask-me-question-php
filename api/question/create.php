<?php

require __DIR__ . '/../../vendor/autoload.php';

use function Api\getRouter;

$body = json_decode(file_get_contents('php://input'), true) ?: [];

getRouter()->handle(fn () => (new Question\Container())->get(Question\Controller::class)->create($body), ["POST"]);
