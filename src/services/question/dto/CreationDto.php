<?php

namespace Question;

use Email;

class CreationDto {
    public function __construct(
        public readonly Message $message,
        public readonly bool $isAnonymous,
        public readonly ?Name $name,
        public readonly ?Email $mail,
        public readonly int $creationTime
    ) {}
}