<?php

namespace Wearesho\Bobra\Ubki\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Class ElementTest
 * @package Wearesho\Bobra\Ubki\Tests
 *
 * @internal
 */
class ElementTest extends TestCase
{
    /** @var Mocks\Element */
    protected static $element;

    /** @var int */
    protected static $fakeValue;

    public static function setUpBeforeClass(): void
    {
        static::$fakeValue = mt_rand();
        static::$element = new Mocks\Element(static::$fakeValue);
    }

    public function testMagicGetSuccess(): void
    {
        $this->assertEquals(static::$fakeValue, static::$element->value);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Property with this name does not exist!
     */
    public function testMagicGetInvalid(): void
    {
        /** @noinspection PhpUndefinedFieldInspection */
        static::$element->invalidProperty;
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Property is in only-read mode
     */
    public function testResetValue(): void
    {
        $property = 'value';
        static::$element->$property = 10;
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage This entity is dynamically unchangeable
     */
    public function testSetNotRelatedProperty(): void
    {
        /** @noinspection PhpUndefinedFieldInspection */
        static::$element->notRelatedProperty = 10;
    }
}
