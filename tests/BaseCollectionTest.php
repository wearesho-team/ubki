<?php

namespace Wearesho\Bobra\Ubki\Tests;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki;

/**
 * Class BaseCollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests
 */
class BaseCollectionTest extends TestCase
{
    public const FIRST_VALUE = 1;
    public const SECOND_VALUE = 2;
    public const THIRD_VALUE = 3;

    /** @var Ubki\BaseCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new class extends Ubki\BaseCollection
        {
            public function type(): string
            {
                return Ubki\Tests\Mocks\Element::class;
            }
        };

        parent::setUp();
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Element Exception must be instance of Wearesho\Bobra\Ubki\Tests\Mocks\Element
     */
    public function testInstanceWithInvalidArgument(): void
    {
        new $this->collection([new \Exception()]);
    }

    public function testAppends(): void
    {
        $values = [
            mt_rand(),
            mt_rand(),
            mt_rand(),
        ];

        foreach ($values as $value) {
            $this->collection->append(new Ubki\Tests\Mocks\Element($value));
        }

        /**
         * @var int $index
         * @var Ubki\Tests\Mocks\Element $item
         */
        foreach ($this->collection as $index => $item) {
            $this->assertEquals($values[$index], $item->value);
        }
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Element Exception must be instance of Wearesho\Bobra\Ubki\Tests\Mocks\Element
     */
    public function testInvalidElement(): void
    {
        $this->collection->append(new \Exception());
    }

    public function testJson(): void
    {
        $this->assertEquals((array)$this->collection, $this->collection->jsonSerialize());
    }

    public function testArrayObjectAccess(): void
    {
        $this->assertEquals(0, count($this->collection));

        $this->testAppends();

        $element = new Ubki\Tests\Mocks\Element(static::SECOND_VALUE);
        $this->collection[] = $element;

        $this->assertEquals(4, count($this->collection));
        $this->assertEquals($element, $this->collection->offsetGet(3));
    }
}
