<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Push\Error;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Push\Error
 */
class EntityTest extends TestCase
{
    protected const TAG = 'item';

    /** @var Ubki\Push\Error\Entity */
    protected $block;

    protected function setUp(): void
    {
        $this->block = new Ubki\Push\Error\Entity(
            Ubki\Data\Block\Identification::ID,
            'ADDR',
            'lng',
            'CRITICAL',
            'Some message',
            10,
            10
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(Ubki\Push\Error\Entity::TAG, $this->block->tag());
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
            Ubki\Data\Block\Identification::ID,
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
        $this->assertEquals(
            [
                'blockId' => Ubki\Data\Block\Identification::ID,
                'tag' => 'ADDR',
                'attribute' => 'lng',
                'type' => 'CRITICAL',
                'message' => 'Some message',
                'passedStrings' => 10,
                'errorString' => 10
            ],
            $this->block->jsonSerialize()
        );
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
