<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/api/container/getRouter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/services/question/container/Container.php';

use function Api\getRouter;

getRouter()->handle(fn() => (new Question\Container())->get(Question\Controller::class)->create($_POST), ["POST"]);
