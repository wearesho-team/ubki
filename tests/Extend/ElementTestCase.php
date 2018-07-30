<?php

namespace Wearesho\Bobra\Ubki\Tests\Extend;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class ElementTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Extend
 */
abstract class ElementTestCase extends \PHPUnit\Framework\TestCase
{
    protected const TAG = null;

    /** @var Element */
    protected $element;

    public function testTag(): void
    {
        $this->assertEquals(static::TAG, $this->element ? $this->element->tag() : null);
    }
}
