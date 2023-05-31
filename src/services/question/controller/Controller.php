<?php

namespace Question;

require_once __DIR__ . '/../../../../vendor/autoload.php';

use Api;

class Controller {
    public function __construct(
        private Repository $repository,
        private Api\Validator $validator,
        private Serializer $serializer,
        private Helper $helper
    ) {}

    public function create(array $body): array {
        $dto = $this->validator->validateBody(fn () => $this->helper->arrayToCreationDto($body));

        return ["id" => $this->repository->create($dto)];
    }

    public function list(array $body): array {
        $pagination = $this->validator->validateBody(fn () => $this->helper->arrayToPagination($body));

        return array_map(
            fn (Question $question) => $this->serializer->toArray($question),
            $this->repository->list($pagination)
        );
    }
}