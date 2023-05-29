<?php

use PHPUnit\Framework\TestCase;
use Question\Factory;


class QuestionFactoryTest extends TestCase {
    private Factory $factory;

    protected function setUp(): void {
        $this->factory = new Factory();
    }

    public function testCreationFromArray(): void {
        $params = [
            'message' => 'Test message',
            'is_anonymous' => false,
            'name' => 'Name message',
            'mail' => 'ubluewolfu@gmail.com',
            'creation_time' => time(),
            'id' => uniqid() 
        ];
 
        $question = $this->factory->createFromArray($params);
        $this->assertEquals($params['message'], $question->getMessage()->get());
        $this->assertEquals($params['is_anonymous'], $question->getIsAnonymous());
        $this->assertEquals($params['name'], $question->getName()->get());
        $this->assertEquals($params['mail'], $question->getMail()->get());
        $this->assertEquals($params['creation_time'], $question->getCreationTime());
        $this->assertEquals($params['id'], $question->getId()->get());
    }
}