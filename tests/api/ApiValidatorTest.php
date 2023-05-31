<?php

use Api\InvalidRequestException;
use PHPUnit\Framework\TestCase;
use Api\Validator;

class ApiValidatorTest extends TestCase {
    private Validator $validator;

    protected function setUp(): void {
        $this->validator = new Validator();
    }

    /**
     * @testWith ["Test message"]
     *           ["Another test message"]
     */

    public function testInvalidCallback($message): void {
        $this->expectException(InvalidRequestException::class);
        $this->expectExceptionMessage($message);
        $this->expectExceptionCode(400);

        $this->validator->validateBody(function () use ($message) {
            throw new InvalidArgumentException($message);
        });
    }

    /**
     * @testWith ["Test return"]
     *           ["Another test return"]
     */

    public function testValidCallback($value): void {
        $this->assertEquals($value, $this->validator->validateBody(fn() => $value));
    }
}