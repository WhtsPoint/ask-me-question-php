<?php

trait TRegexString {
    private function regex(string $pattern): void {
        if (preg_match($pattern, $this->value) != 1) {
            throw new InvalidArgumentException('Invalid ' . strtolower(static::class) . ' format');
        }
    }
}