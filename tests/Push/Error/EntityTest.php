<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Error;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Push;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Push\Error
 *
 * @internal
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

    public function testGetters(): void
    {
        $this->assertEquals(10, $this->element->passedStringsCount);
        $this->assertEquals(Block\Identifying::ID, $this->element->blockId);
        $this->assertEquals('ADDR', $this->element->tag);
        $this->assertEquals(10, $this->element->errorStringsCount);
        $this->assertEquals('lng', $this->element->attribute);
        $this->assertEquals('CRITICAL', $this->element->type);
        $this->assertEquals('Some message', $this->element->message);
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
}
