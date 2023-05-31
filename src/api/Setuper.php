<?php

namespace Api;

class Settings {
    public function setup(): void {
        header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Headers: Content-Type");
    }
}