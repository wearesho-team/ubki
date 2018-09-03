<?php

namespace Wearesho\Bobra\Ubki\Tests;

use Wearesho\Bobra\Ubki\Element;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Class ElementTest
 * @package Wearesho\Bobra\Ubki\Tests
 * @internal
 */
class ElementTest extends TestCase
{
    public const TAG = 'test';

    /** @var Element */
    protected $fakeElement;

    protected function setUp(): void
    {
        $this->fakeElement = new class implements ElementInterface
        {
            use ElementTrait;

            protected const TAG = ElementTest::TAG;

            public function jsonSerialize()
            {
                return [];
            }
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
