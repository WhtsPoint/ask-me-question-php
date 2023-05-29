<?php

namespace Question\Repository;

use Question\Question;

interface IFactory {
    public function createFromArray(array $params): Question;
}