<?php

use PHPUnit\Framework\TestCase;

class StringObjectTest extends TestCase {
    use TStringObject;

    public function testInvalidType(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('StringObjectTest must be string');
        $this->isString(1);
    }
}