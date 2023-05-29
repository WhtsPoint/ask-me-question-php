<?php

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase {
    public function testValidValue(): void {
        $address = 'ubluewolfu@gmail.com';
        $mail = new Email($address);
        $this->assertEquals($address, $mail->get());
    }

    public function testInvalidValue(): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid email format');
        new Email("invalid@mail");
    }
}   