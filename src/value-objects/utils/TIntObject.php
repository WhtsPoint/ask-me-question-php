<?php

trait TIntObject {
    private int $value;

    public function validateInt($value): int {
        if (!is_numeric($value)) throw new InvalidArgumentException(static::class . ' must be decimal number');        
        return (int) $value;
    }

    public function get(): int {
        return $this->value;
    }
}