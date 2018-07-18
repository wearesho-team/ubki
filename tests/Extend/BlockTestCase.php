<?php

namespace Wearesho\Bobra\Ubki\Tests\Extend;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class BlockTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Extend
 */
abstract class BlockTestCase extends \PHPUnit\Framework\TestCase
{
    /** @var Block */
    protected $block;

    public function testTag(): void
    {
        $this->assertEquals($this->tag(), $this->block ? $this->block->tag() : null);
    }

    abstract public function tag(): string;
}
