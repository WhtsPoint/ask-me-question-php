<?php 

use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase {
    use TContainer;

    private string $key = 'testKey';
    private string $value = 'testValue';

    protected function setUp(): void {
        $this->objects = [
            $this->key => fn() => $this->value 
        ];
    }

    public function testExistingItem(): void {
        $this->assertEquals(true, $this->has($this->key));
        $this->assertEquals($this->value, $this->get($this->key));
    }

    public function testNotExistingItem(): void {
        $invalidKey = 'anotherKey';
        $this->assertEquals(false, $this->has($invalidKey));
        $this->expectException(ContainerItemNotFoundException::class);
        $this->get($invalidKey);
    }
}