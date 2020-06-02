<?php

namespace Wearesho\Bobra\Ubki\Tests;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;

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
        $this->fakeElement = new class extends Element implements ElementInterface
        {
            protected const TAG = ElementTest::TAG;

            public function jsonSerialize(): array
            {
                return [];
            }

            public function tag(): string
            {
                return static::TAG;
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
