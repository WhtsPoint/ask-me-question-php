<?php

namespace Question;

require_once __DIR__ . '/../../../../vendor/autoload.php';

use Api;
use Email;
use Pagination;

class Controller {
    public function __construct(
        private Repository $repository,
        private Api\Validator $validator,
        private Serializer $serializer
    ) {}

    public function create(array $body): array {
        $this->validator->validateBody(function () use (&$dto, $body) {
            $isAnonymous = filter_var(@$body['isAnonymous'], FILTER_VALIDATE_BOOL);
            $dto = new CreationDto(
                new Message(@$body['message']),
                $isAnonymous,
                !$isAnonymous ? new Name(@$body['name']) : NULL,
                (!$isAnonymous && is_string(@$body['mail'])) ? new Email(@$body['mail']) : NULL,
                time()
            );
        });

        return ["id" => $this->repository->create($dto)];
    }

    public function list(array $body): array {
        $this->validator->validateBody(function () use (&$pagination, $body) {
            $pagination = new Pagination(@$body['page'], @$body['count']);
        });

        return array_map(
            fn (Question $question) => $this->serializer->toArray($question),
            $this->repository->list($pagination)
        );
    }
}