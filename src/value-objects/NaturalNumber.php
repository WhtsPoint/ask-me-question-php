<?php

require_once __DIR__ . '/utils/TIntObject.php';

class NaturalNumber {
    use TIntObject;

    public function __construct($value) {
        $this->value = $this->validateInt($value);
        if($this->value < 1) throw new InvalidArgumentException(static::class . ' must be natural number');
    }
}