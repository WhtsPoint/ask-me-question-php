<?php

use PHPUnit\Framework\TestCase;
use Question\{Question, Message, Name};

class QuestionModelTest extends TestCase {
    private Question $question;
    
    public function setUp(): void {
        $this->question = new Question();
    }

    /**
     * @dataProvider getParams 
     */
    
    public function testSettersAndGetter($data): void {
        $message = new Message($data['message']);
        $name = new Name($data['name']);
        $mail = new Email($data['mail']);
        $creationTime = $data['creationTime'];
        $id = new Id($data['id']);

        $this->question->setMessage($message);
        $this->question->setIsAnonymous($data['isAnonymous']);
        $this->question->setName($name);
        $this->question->setMail($mail);
        $this->question->setCreationTime($creationTime);
        $this->question->setId($id);

        $this->assertEquals($data['message'], $this->question->getMessage()->get());
        $this->assertEquals($data['isAnonymous'], $this->question->getIsAnonymous());
        $this->assertEquals($data['name'], $this->question->getName()->get());
        $this->assertEquals($data['mail'], $this->question->getMail()->get());
        $this->assertEquals($data['creationTime'], $this->question->getCreationTime());
        $this->assertEquals($data['id'], $this->question->getId()->get());
    }

    public function getParams(): array {
        return [
            [[
                'message' => 'Test message',
                'isAnonymous' => true,
                'name' => 'Test name',
                'mail' => 'test@mail.com',
                'creationTime' => time(),
                'id' => uniqid()
            ]]
        ];
    }
}