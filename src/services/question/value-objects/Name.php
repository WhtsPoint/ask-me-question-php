<?php

namespace Question;

require_once __DIR__ . '/../../../../vendor/autoload.php';

class Name {
    use \TLimitedString, \TStringObject;

    public function __construct($value) {
        $this->isString($value);
        $this->value = $value;
        $this->size(1, 100);
    }
}
