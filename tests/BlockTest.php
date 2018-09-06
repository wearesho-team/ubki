<?php

namespace Wearesho\Bobra\Ubki\Tests;

use Wearesho\Bobra\Ubki\Block;

use PHPUnit\Framework\TestCase;

/**
 * Class BlockTest
 * @package Wearesho\Bobra\Ubki\Tests
 * @coversDefaultClass Block
 * @internal
 */
class BlockTest extends TestCase
{
    public const ID = 0;

    /** @var Block */
    protected $fakeBlock;

    protected function setUp(): void
    {
        $this->fakeBlock = new class extends Block
        {
            public const ID = BlockTest::ID;

            public function jsonSerialize()
            {
                return [];
            }
        };
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            static::ID,
            $this->fakeBlock->getId()
        );
    }
}
