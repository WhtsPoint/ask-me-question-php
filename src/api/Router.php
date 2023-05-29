<?php

namespace Api;

use Logger\ILogger;

class Router {
    public function __construct(
        private ILogger $logger,
        private Request $router
    ) {}

    public function handle(callable $callback, ?array $methods = NULL): void {
        try {
            if ($methods) $this->router->validateMethod($methods);
            $response = $callback();
            http_response_code(200);
            echo json_encode($response);
        } catch (InvalidRequestException $exception) {
            http_response_code($exception->getCode());
            if ($message = $exception->getMessage()) echo json_encode(["error" => $message]);
        } catch(\Throwable $exception) {
            http_response_code(500);

            $this->logger->writeError($exception->__toString());
        }
    }
}