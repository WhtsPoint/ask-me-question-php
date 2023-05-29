<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/exceptions/ContainerItemNotFoundException.php';

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