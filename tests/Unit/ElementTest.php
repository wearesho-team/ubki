<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ElementTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit
 */
class ElementTest extends TestCase
{
    public const TAG = 'tag';

    /** @var Ubki\Element */
    protected $fakeElement;

    protected function setUp(): void
    {
        $this->fakeElement = new class
            extends Ubki\Element
            implements Ubki\ElementInterface
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
