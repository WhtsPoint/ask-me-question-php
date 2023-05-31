<?php

use Api\InvalidRequestException;
use Api\Request;
use Api\Router;
use Api\Settings;
use Logger\ILogger;
use PHPUnit\Framework\MockObject\Rule\InvokedCount;
use PHPUnit\Framework\TestCase;

class RouterValidatorTest extends TestCase {

    /**
     * @testWith [{"key": "value"}]
     *           ["abc"]
     */

    public function testSuccess($data): void {
        $this->expectOutputString(json_encode($data));
        $router = $this->createBasicRouter();
        $router->handle(fn () => $data, ['GET']);
        $this->assertEquals(http_response_code(), 200);
    }

    /**
     * @testWith [{"error": "Invalid argument", "code": 100}]
     *           [{"error": "Another error", "code": 12}]
     *           [{"error": "And another error", "code": 2356}]
     */
    
    public function testInvalidRequest($data): void {
        $this->expectOutputString('{"error":"' . $data['error'] . '"}');
        $router = $this->createBasicRouter();
        $router->handle(fn () => throw new InvalidRequestException($data['code'], $data['error']), ['POST']);
        $this->assertEquals(http_response_code(), $data['code']);
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

    private function mokeSettings(): Settings {
        $settings = $this->createMock(Settings::class);
        $settings->expects($this->once())->method('setup');
        return $settings;
    }

    private function createBasicRouter(): Router {
        return new Router(
            $this->mokeLogger($this->never()),
            $this->mokeRequest($this->once()),
            $this->mokeSettings()
        );
    }

    private function createServerErrorRouter(): Router {
        return new Router(
            $this->mokeLogger($this->once()),
            $this->mokeRequest($this->never()),
            $this->mokeSettings()
        );
    }
}