<?php
use PHPUnit\Framework\TestCase;

class RegexStringTest extends TestCase {
    use TRegexString;

    private string $value;

    /**
     * @dataProvider getValidData 
     */

    public function testInValid($pattern, $value): void {
        $this->expectException(InvalidArgumentException::class);
        $this->getExpectedExceptionMessage('Invalid regexstringtest format');
        $this->value = $value;
        $this->regex($pattern);
    }

    public function getValidData(): array {
        return [
            ["/^[^@\s]+@[^\.@\s]+\.[^\.@\s]+$/", 'testmail@gmail@.com'],
            ["/^[a-z0-9]{13}$/", uniqid() . ' '],
        ];
    }
}