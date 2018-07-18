<?php

namespace Wearesho\Bobra\Ubki\Tests\Extend;

use Wearesho\Bobra\Ubki\BaseBlock;

/**
 * Class BlockTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Extend
 */
abstract class BlockTestCase extends \PHPUnit\Framework\TestCase
{
    /** @var BaseBlock */
    protected $block;

    public function testTag(): void
    {
        $this->assertEquals($this->tag(), $this->block ? $this->block->tag() : null);
    }

    abstract function tag(): string;
}
