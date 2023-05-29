<?php

namespace Logger;

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/config/logger.php';
require_once 'ILogger.php';

class Logger implements ILogger {
    public function writeError(string $message): void {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . Config::LOG_FILE_PATH;
    
        $file = fopen($filePath, 'a+');
        fwrite($file, '[Error] [' . date("d.m.Y H:i") . '] ' . $message . "\n");
        fclose($file);
    }
}