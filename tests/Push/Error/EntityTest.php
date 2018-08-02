<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Error;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Push;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Push\Error
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'item';

    /** @var Push\Error\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Push\Error\Entity(
            Block\Identifying::ID,
            'ADDR',
            'lng',
            'CRITICAL',
            'Some message',
            10,
            10
        );
    }

    public function testGetPassedStrings(): void
    {
        $this->assertEquals(
            10,
            $this->element->getPassedStringsCount()
        );
    }

    public function testGetBlockId(): void
    {
        $this->assertEquals(
            Block\Identifying::ID,
            $this->element->getBlockId()
        );
    }

    public function testGetTag(): void
    {
        $this->assertEquals(
            'ADDR',
            $this->element->getTag()
        );
    }

    public function testGetErrorStrings(): void
    {
        $this->assertEquals(
            10,
            $this->element->getErrorStringsCount()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'blockId' => Block\Identifying::ID,
                'tag' => 'ADDR',
                'attribute' => 'lng',
                'type' => 'CRITICAL',
                'message' => 'Some message',
                'passedStrings' => 10,
                'errorString' => 10
            ],
            $this->element->jsonSerialize()
        );
    }

    public function testGetAttribute(): void
    {
        $this->assertEquals(
            'lng',
            $this->element->getAttribute()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            'CRITICAL',
            $this->element->getType()
        );
    }

    public function testGetMessage(): void
    {
        $this->assertEquals(
            'Some message',
            $this->element->getMessage()
        );
    }
}
