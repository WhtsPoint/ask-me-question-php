<?php

namespace Question;

class Serializer {
    public function toArray(Question $question): array {
        return [
            'message' => $question->getMessage()->get(),
            'isAnonymous' => $question->getIsAnonymous(),
            'name' => $question->getName() ? $question->getName()->get() : NULL,
            'mail' => $question->getMail() ? $question->getMail()->get() : NULL,
            'creationTime' => $question->getCreationTime(),
            'id' => $question->getId()->get()
        ];
    }
}