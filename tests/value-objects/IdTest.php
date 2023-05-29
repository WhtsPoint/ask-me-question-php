<?php

use PHPUnit\Framework\TestCase;

class IdTest extends TestCase {
    public function testValidValue(): void {
        $value = uniqid();
        $id = new Id($value);
        $this->assertEquals($value, $id->get());
    }

    public function testInvalidValue(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid id format');
        new Id("");
    }
}