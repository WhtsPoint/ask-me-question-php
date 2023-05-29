<?php

use PHPUnit\Framework\TestCase;

class LimitedStringTest extends TestCase {
    use TLimitedString;

    private string $value;

    public function testShortValue() {
        $this->value = '';
        $this->checkSize();
    }

    public function testLongValue() {
        $this->value = str_repeat(' ', 51);
        $this->checkSize();
    }

    private function checkSize(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->size(1, 50);
    }
}