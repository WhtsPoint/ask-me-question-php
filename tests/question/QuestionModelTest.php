<?php

use PHPUnit\Framework\TestCase;
use Question\{Question, Message, Name};

class QuestionModelTest extends TestCase {
    private Question $question;
    
    public function setUp(): void {
        $this->question = new Question();
    }

    public function testSettersAndGetter() {
        $message = "Test message";
        $name = "Test name";
        $mail = "Test mail";
        $creationTime = time();
        $id = uniqid();

        $messageStub = $this->createStub(Message::class);
        $messageStub->method('get')->willReturn($message);
        $nameStub = $this->createStub(Name::class);
        $nameStub->method('get')->willReturn($name);
        $mailStub = $this->createStub(Email::class);
        $mailStub->method('get')->willReturn($mail);
        $idStub = $this->createStub(Id::class);
        $idStub->method('get')->willReturn($id);

        $this->question->setMessage($messageStub);
        $this->question->setIsAnonymous(true);
        $this->question->setName($nameStub);
        $this->question->setMail($mailStub);
        $this->question->setCreationTime($creationTime);
        $this->question->setId($idStub);

        $this->assertEquals($message, $this->question->getMessage()->get());
        $this->assertEquals(true, $this->question->getIsAnonymous());
        $this->assertEquals($name, $this->question->getName()->get());
        $this->assertEquals($mail, $this->question->getMail()->get());
        $this->assertEquals($creationTime, $this->question->getCreationTime());
        $this->assertEquals($id, $this->question->getId()->get());
    }
}