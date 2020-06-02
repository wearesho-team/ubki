<?php

namespace Wearesho\Bobra\Ubki\Tests;

use Wearesho\Bobra\Ubki\Infrastructure;

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

    /** @var Infrastructure\BaseCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new class extends Infrastructure\BaseCollection
        {
            public function type(): string
            {
                return Mocks\Element::class;
            }
        };

        parent::setUp();
    }

    public function testInstanceWithInvalidArgument(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Element Exception must be instance of Wearesho\Bobra\Ubki\Tests\Mocks\Element');
        new $this->collection([new \Exception()]);
    }

    public function testAppends(): void
    {
        $this->collection->append(new Mocks\Element(BaseCollectionTest::FIRST_VALUE));
        $this->collection->append(new Mocks\Element(BaseCollectionTest::SECOND_VALUE));
        $this->collection->append(new Mocks\Element(BaseCollectionTest::THIRD_VALUE));

        $this->assertEquals($this->collection->offsetGet(0)->getValue(), static::FIRST_VALUE);
        $this->assertEquals($this->collection->offsetGet(1)->getValue(), static::SECOND_VALUE);
        $this->assertEquals($this->collection->offsetGet(2)->getValue(), static::THIRD_VALUE);
    }

    public function testInvalidElement(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Element Exception must be instance of Wearesho\Bobra\Ubki\Tests\Mocks\Element');
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

        $element = new Mocks\Element(static::SECOND_VALUE);
        $this->collection[] = $element;

        $this->assertEquals(4, count($this->collection));
        $this->assertEquals($element, $this->collection->offsetGet(3));
    }
}
