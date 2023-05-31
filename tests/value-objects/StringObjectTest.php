<?php

use PHPUnit\Framework\TestCase;

class StringObjectTest extends TestCase {
    use TStringObject;

    /**
     * @dataProvider getNotStringValues 
     */


    public function testInvalidType($value): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('StringObjectTest must be string');
        $this->isString($value);
    }

    public function getNotStringValues(): array {
        return [
            [1],
            [true],
            [function () {}],
        ];
    }
}