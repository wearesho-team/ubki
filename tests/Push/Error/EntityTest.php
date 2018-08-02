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
    protected $block;

    protected function setUp(): void
    {
        $this->block = new Push\Error\Entity(
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
            $this->block->getPassedStringsCount()
        );
    }

    public function testGetBlockId(): void
    {
        $this->assertEquals(
            Block\Identifying::ID,
            $this->block->getBlockId()
        );
    }

    public function testGetTag(): void
    {
        $this->assertEquals(
            'ADDR',
            $this->block->getTag()
        );
    }

    public function testGetErrorStrings(): void
    {
        $this->assertEquals(
            10,
            $this->block->getErrorStringsCount()
        );
    }

    public function testJsonSerialize(): void
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->assertJsonSerialize([
            'blockId' => Block\Identifying::ID,
            'tag' => 'ADDR',
            'attribute' => 'lng',
            'type' => 'CRITICAL',
            'message' => 'Some message',
            'passedStrings' => 10,
            'errorString' => 10
        ]);
    }

    public function testGetAttribute(): void
    {
        $this->assertEquals(
            'lng',
            $this->block->getAttribute()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            'CRITICAL',
            $this->block->getType()
        );
    }

    public function testGetMessage(): void
    {
        $this->assertEquals(
            'Some message',
            $this->block->getMessage()
        );
    }
}
