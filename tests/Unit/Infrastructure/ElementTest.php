<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Infrastructure;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ElementTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Infrastructure
 */
class ElementTest extends TestCase
{
    public const TAG = 'tag';

    /** @var Ubki\Infrastructure\Element */
    protected $fakeElement;

    protected function setUp(): void
    {
        $this->fakeElement = new class
            extends Ubki\Infrastructure\Element
            implements Ubki\Infrastructure\ElementInterface
        {
            /** @var string */
            public $value = 'value';

            public const TAG = ElementTest::TAG;
        };
    }

    public function testTag(): void
    {
        $this->assertEquals(static::TAG, $this->fakeElement->tag());
    }

    public function testJson(): void
    {
        $this->assertEquals(['value' => $this->fakeElement->value], $this->fakeElement->jsonSerialize());
    }
}
