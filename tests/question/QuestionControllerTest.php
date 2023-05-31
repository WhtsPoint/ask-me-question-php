<?php

use Api\Validator;
use PHPUnit\Framework\TestCase;
use Question\Controller;
use Question\CreationDto;
use Question\Helper;
use Question\Repository;
use Question\Serializer;
use Question\Question;

class QuestionControllerTest extends TestCase {
    public function testCreate(): void {
        $dataStub = [];
        $dtoStub = $this->createStub(CreationDto::class);
        $mockHelper = $this->createMock(Helper::class);
        $mockRepository = $this->createMock(Repository::class);
        $mockSerializer = $this->createMock(Serializer::class);
    
        $mockHelper->expects($this->once())->method('arrayToCreationDto')->with($dataStub)->willReturn($dtoStub);
        $mockRepository->expects($this->once())->method('create')->with($dtoStub)->willReturn('testId');
        $mockValidator = $this->mockValidator(fn () => $mockHelper->arrayToCreationDto($dataStub));

        $controller = new Controller($mockRepository, $mockValidator, $mockSerializer, $mockHelper);
        $this->assertEquals(['id' => 'testId'], $controller->create($dataStub));
    }

    public function testList(): void {
        $dataStub = [];
        $paginationStub = $this->createStub(Pagination::class);
        $mockHelper = $this->createMock(Helper::class);
        $mockRepository = $this->createMock(Repository::class);
        $mockSerializer = $this->createMock(Serializer::class);
        $questionsStub = [$this->createStub(Question::class)];

        $mockHelper->expects($this->once())->method('arrayToPagination')->with($dataStub)->willReturn($paginationStub);
        $mockRepository->expects($this->once())->method('list')->with($paginationStub)->willReturn($questionsStub);
        $mockSerializer->expects($this->once())->method('toArray')->willReturnCallback(fn ($question) => ["question" => $question::class]);
        $mockValidator = $this->mockValidator(fn () => $mockHelper->arrayToPagination($dataStub));

        $controller = new Controller($mockRepository, $mockValidator, $mockSerializer, $mockHelper);
        $this->assertEquals(["question" => $questionsStub[0]::class], $controller->list($dataStub)[0]);
    }

    private function mockValidator(callable $callback): Validator {
        $mokeValidator = $this->createMock(Validator::class);

        $mokeValidator->expects($this->once())
        ->method('validateBody')
        ->with($callback)
        ->willReturnCallback(fn ($callback) => $callback());        
        
        return $mokeValidator;
    }

}