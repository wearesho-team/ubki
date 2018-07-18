<?php

namespace Wearesho\Bobra\Ubki\Tests\Extend;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class BlockTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Extend
 */
abstract class BlockTestCase extends \PHPUnit\Framework\TestCase
{
    protected const TAG = null;

    /** @var Element */
    protected $block;

    public function testTag(): void
    {
        $this->assertEquals(static::TAG, $this->block ? $this->block->tag() : null);
    }
}
