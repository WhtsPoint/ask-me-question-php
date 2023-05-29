<?php

require_once __DIR__ . '/utils/TRegexString.php';
require_once __DIR__ . '/utils/TStringObject.php';

class Id {    
    use TRegexString, TStringObject;

    public function __construct($value) {
        $this->isString($value);
        $this->value = $value;
        $this->regex('/^[a-z0-9]{13}$/');
    }
}