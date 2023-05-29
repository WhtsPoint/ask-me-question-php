<?php

use Api\InvalidRequestException;
use Api\Request;
use Api\Router;
use Logger\ILogger;
use PHPUnit\Framework\MockObject\Rule\InvokedCount;
use PHPUnit\Framework\TestCase;

class RouterValidatorTest extends TestCase {
    public function testSuccess(): void {
        $this->expectOutputString('{"key":"value"}');
        $router = $this->createBasicRouter();
        $router->handle(fn () => ['key' => 'value'], ['GET']);
        $this->assertEquals(http_response_code(), 200);
    }

    public function testInvalidRequest(): void {
        $code = 502;
        $error = 'Error message';
        $this->expectOutputString('{"error":"' . $error . '"}');
        $router = $this->createBasicRouter();
        $router->handle(fn () => throw new InvalidRequestException($code, $error), ['POST']);
        $this->assertEquals(http_response_code(), $code);
    }

    public function testServerError(): void {
        $router = $this->createServerErrorRouter();
        $router->handle(fn () => throw new Exception());
        $this->assertEquals(http_response_code(), 500);
    }

    private function mokeRequest(InvokedCount $expects): Request {
        $request = $this->createMock(Request::class);
        $request->expects($expects)->method('validateMethod');
        return $request;
    }

    private function mokeLogger(InvokedCount $expects): ILogger {
        $logger = $this->createMock(ILogger::class);
        $logger->expects($expects)->method('writeError');
        return $logger;
    }

    private function createBasicRouter(): Router {
        return new Router(
            $this->mokeLogger($this->never()),
            $this->mokeRequest($this->once())
        );
    }

    private function createServerErrorRouter(): Router {
        return new Router(
            $this->mokeLogger($this->once()),
            $this->mokeRequest($this->never())
        );
    }
}