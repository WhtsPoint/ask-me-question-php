<?php

use PHPUnit\Framework\TestCase;

class LimitedStringTest extends TestCase {
    use TLimitedString;

    private string $value;

    /**
      * @testWith [""]
      *           ["а"]
      *           ["абвгґдеєжзиіїйклмнопрстуфхцчшщьюяabcdefghijklmnopqr"] 
      *           ["абвгґдеєжзиіїйклмнопрстуфхцчшщьюяabcdefghijklmnopqrt"]
      */

    public function testValue($value): void {
        $this->value = $value;
        $this->checkSize();
    }

    private function checkSize(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid limitedstringtest length (min: 2,max: 50) given: ' . mb_strlen($this->value));
        $this->size(2, 50);
    }
}