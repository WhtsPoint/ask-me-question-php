<?php

namespace Question;

require_once __DIR__ . '/../../../../vendor/autoload.php';

use Email;
use Id;

class Factory implements Repository\IFactory {
    public function createFromArray(array $params): Question {
        return $this->create(new FactoryCreationDto(
            $params['message'],
            $params['is_anonymous'],
            $params['name'],
            $params['mail'],
            $params['creation_time'],
            $params['id']
        ));
    }

    public function create(FactoryCreationDto $dto): Question {
        $question = $this->get();
        $question->setMessage($dto->message ? new Message($dto->message) : NULL);
        $question->setIsAnonymous($dto->isAnonymous);
        $question->setName(isset($dto->name) ? new Name($dto->name) : NULL);
        $question->setMail(isset($dto->mail) ? new Email($dto->mail) : NULL);
        $question->setCreationTime($dto->creationTime);
        $question->setId(new Id($dto->id));
        return $question;
    }

    public function get(): Question {
        return new Question();
    }
}