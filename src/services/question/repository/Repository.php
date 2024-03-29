<?php

namespace Question;

require_once __DIR__ . '/../../../../vendor/autoload.php';

use Database\IHandler;
use Question\Repository\IFactory;
use Pagination;

class Repository {
    public function __construct(
        private IHandler $handler,
        private IFactory $factory
    ) {}

    public function create(CreationDto $dto): string {
        $id = uniqid();
        $this->handler->query(
            "INSERT INTO questions VALUES (?,?,?,?,?,?)",
            [
                $dto->message->get(),
                $dto->isAnonymous,
                $dto->name ? $dto->name->get() : NULL,
                $dto->mail ? $dto->mail->get() : NULL,
                $dto->creationTime,
                $id 
            ]
        );
        return $id;
    }

    public function list(Pagination $pagination): array {
        $questions = $this->handler->query(
            "SELECT * FROM questions ORDER BY creation_time DESC LIMIT ?,?",
            [$pagination->getLast(), $pagination->getCount()]
        );
        return array_map(fn (array $question) => $this->factory->createFromArray($question), $questions);
    }

    public function isExists(string $id): bool {
        return $this->handler->query('SELECT COUNT(*) > 0 `isExists` FROM questions WHERE id = ?', [$id])[0]['isExists'];
    }
}