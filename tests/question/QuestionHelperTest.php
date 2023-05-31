<?php
use PHPUnit\Framework\TestCase;
use Question\Helper;

class QuestionHelperTest extends TestCase {
    private Helper $helper;

    protected function setUp(): void {
        $this->helper = new Helper();
    }
    
    /**
     * @testWith [{"message": "Message"}]
     *           [{"message": "Text", "name": "Alexandr"}]
     *           [{"message": "Value", "name": "Vladymyr", "mail": "test@mail.com"}]
     *           [{"message": "Question", "mail": "test1@def.sda"}]
     */

    public function testValidAnonymous($data): void {
        $dto = $this->helper->arrayToCreationDto([...$data, "isAnonymous" => true]);
        $this->assertEquals($data['message'], $dto->message->get());
        $this->assertEquals(true, $dto->isAnonymous);
        $this->assertEquals(NULL, $dto->name);
        $this->assertEquals(NULL, $dto->mail);
    }

    /**
     * @testWith [{"message": "Sentence", "name": "Vitya"}]
     *           [{"message": "Value", "name": "Vadym"}]
     *           [{"message": "Words", "name": "Bogdan", "mail": "mail@bdf.com"}]
     *           [{"message": "Letter", "name": "Dima", "mail": "mail@mail.ua"}]
     */

    public function testValidNotAnonymous($data): void {
        $dto = $this->helper->arrayToCreationDto([...$data, "isAnonymous" => false]);
        $this->assertEquals($data['message'], $dto->message->get());
        $this->assertEquals(false, $dto->isAnonymous);
        $this->assertEquals($data['name'], $dto->name->get());
        $this->assertEquals(@$data['mail'], $dto->mail ? $dto->mail->get() : NULL);
    }

    /**
     * @testWith [{}]
     *           [{"message": "Words", "isAnonymous": false}]
     */

    public function testInvalidArgumentException($data): void {
        $this->expectException(InvalidArgumentException::class);
        $this->helper->arrayToCreationDto($data); 
    }

    /**
     * @testWith [{"page": 1, "count": 10}]
     *           [{"page": 2, "count": 3}]
     *           [{"page": 3, "count": 1}]
     */

    public function testValidPagination($data): void {
        $pagination = $this->helper->arrayToPagination($data);
        $this->assertEquals($data['page'], $pagination->getPage());
        $this->assertEquals($data['count'], $pagination->getCount());
    }

    /**
     * @testWith [{}]
     *           [{"page": 1}]
     *           [{"count": 1}]
     */

    public function testInvalidPagination($data) {
        $this->expectException(InvalidArgumentException::class);
        $this->helper->arrayToPagination($data);
    }
}