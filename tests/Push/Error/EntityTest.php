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

    public function testGetters(): void
    {
        $this->assertEquals(10, $this->block->passedStringsCount);
        $this->assertEquals(Block\Identifying::ID, $this->block->blockId);
        $this->assertEquals('ADDR', $this->block->tag);
        $this->assertEquals(10, $this->block->errorStringsCount);
        $this->assertEquals('lng', $this->block->attribute);
        $this->assertEquals('CRITICAL', $this->block->type);
        $this->assertEquals('Some message', $this->block->message);
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
}
