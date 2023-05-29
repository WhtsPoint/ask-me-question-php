<?php

namespace Question;

class FactoryCreationDto {
    public function __construct(
        public readonly string $message,
        public readonly bool $isAnonymous,
        public readonly ?string $name,
        public readonly ?string $mail,
        public readonly int $creationTime,
        public readonly string $id
    ) {}
}