<?php

namespace Api;

require_once 'Container.php';

function getRouter(): Router {
    return (new Container())->get(Router::class);
}