<?php

trait TStringObject {
    private string $value;
    
    private function isString($value): void {
        if(!is_string($value)) throw new InvalidArgumentException(static::class . ' must be string');
    }

    public function get(): string {
        return $this->value;   
    }
}