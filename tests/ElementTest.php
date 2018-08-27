<?php

namespace Wearesho\Bobra\Ubki\Tests;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class ElementTest
 * @package Wearesho\Bobra\Ubki\Tests
 * @coversDefaultClass Element
 * @internal
 */
class ElementTest extends TestCase
{
    protected const TAG = 'test';

    /** @var Element */
    protected $fakeElement;

    protected function setUp(): void
    {
        $this->fakeElement = new class extends Element
        {
            public const TAG = 'test';
        };
    }

    public function testTag(): void
    {
        $this->assertEquals(
            static::TAG,
            $this->fakeElement->tag()
        );
    }
}
