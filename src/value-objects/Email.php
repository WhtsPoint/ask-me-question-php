<?php

require_once __DIR__ . '/utils/TRegexString.php';
require_once __DIR__ . '/utils/TStringObject.php';
require_once __DIR__ . '/utils/TLimitedString.php';

class Email {    
    use TRegexString, TStringObject, TLimitedString;

    public function __construct($value) {
        $this->isString($value);
        $this->value = $value;
        $this->regex('/^[^@]+@[^\.@]+\.[^\.@]+$/');
        $this->size(max: 100);
    }
}