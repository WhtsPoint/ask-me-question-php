<?php

use Api\InvalidRequestException;
use PHPUnit\Framework\TestCase;
use Api\Validator;

class ApiValidatorTest extends TestCase {
    private Validator $validator;

    protected function setUp(): void {
        $this->validator = new Validator();
    }

    public function testValidateBody(): void {
        $message = 'Test message';

        $this->expectException(InvalidRequestException::class);
        $this->expectExceptionMessage($message);
        $this->expectExceptionCode(400);

        $this->validator->validateBody(function () use ($message) {
            throw new InvalidArgumentException($message);
        });
    }
}