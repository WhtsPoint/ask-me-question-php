<?php

require_once __DIR__ . '/../../vendor/autoload.php';

trait TContainer {
    private array $objects;

    public function get(string $name): mixed {
        if (!$this->has($name)) throw new ContainerItemNotFoundException();
        return $this->objects[$name]();
    }

    public function has(string $name): mixed {
        return isset($this->objects[$name]);
    }
}