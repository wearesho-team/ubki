<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit;

use Wearesho\Bobra\Ubki\Block;
use PHPUnit\Framework\TestCase;

/**
 * Class BlockTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit
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

            public function jsonSerialize(): array
            {
                return [];
            }
        };
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Block::TAG,
            $this->fakeBlock->tag()
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            static::ID,
            $this->fakeBlock->getId()
        );
    }
}
