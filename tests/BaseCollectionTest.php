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
     */
    public function testInstanceWithInvalidArgument(): void
    {
        $element = new class
        {
        };
        $elementClassName = get_class($element);

        $this->expectExceptionMessage(
            "Element {$elementClassName} must be compatible with " . Ubki\Tests\Mocks\Element::class
        );

        new $this->collection([$element]);
    }

    public function testAppends(): void
    {
        $this->collection->append(new Ubki\Tests\Mocks\Element(BaseCollectionTest::FIRST_VALUE));
        $this->collection->append(new Ubki\Tests\Mocks\Element(BaseCollectionTest::SECOND_VALUE));
        $this->collection->append(new Ubki\Tests\Mocks\Element(BaseCollectionTest::THIRD_VALUE));

        $this->assertEquals($this->collection->offsetGet(0)->getValue(), static::FIRST_VALUE);
        $this->assertEquals($this->collection->offsetGet(1)->getValue(), static::SECOND_VALUE);
        $this->assertEquals($this->collection->offsetGet(2)->getValue(), static::THIRD_VALUE);
    }

    public function testInvalidElement(): void
    {
        $element = new class
        {
        };
        $elementClassName = get_class($element);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "Element {$elementClassName} must be compatible with " . Ubki\Tests\Mocks\Element::class
        );

        $this->collection->append($element);
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
