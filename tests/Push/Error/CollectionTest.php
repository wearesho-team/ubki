<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Error;

use Wearesho\Bobra\Ubki\Blocks\Identification;
use Wearesho\Bobra\Ubki\Push;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Push\Error
 */
class CollectionTest extends Tests\Extend\CollectionTestCase
{
    protected const TYPE = Push\Error\Entity::class;

    /** @var Push\Error\Collection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new Push\Error\Collection([
            new Push\Error\Entity(
                1,
                'ADDR',
                'lng',
                'CRITICAL',
                'Some message',
                10,
                10
            ),
            new Push\Error\Entity(
                1,
                'DOC',
                'type',
                'CRITICAL',
                'Some message',
                2,
                3
            )
        ]);
    }

    public function testInstance(): void
    {
        $elements = [
            new Push\Error\Entity(
                1,
                'ADDR',
                'lng',
                'CRITICAL',
                'Some message',
                10,
                10
            ),
            new Push\Error\Entity(
                1,
                'DOC',
                'type',
                'CRITICAL',
                'Some message',
                2,
                3
            )
        ];

        $this->assertEquals(
            new Push\Error\Collection($elements),
            $this->collection
        );
        $this->assertEquals(
            $elements,
            $this->collection->jsonSerialize()
        );
    }
}
