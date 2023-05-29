<?php

namespace Database;

interface IHandler {
    public function query(string $statement, ?array $params): array;
}
