<?php

namespace Logger;

interface ILogger {
    public function writeError(string $message): void;
}