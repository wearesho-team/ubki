<?php

namespace Wearesho\Bobra\Ubki\Tests\Infrastructure;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;

/**
 * Class ElementTest
 * @package Wearesho\Bobra\Ubki\Tests\Infrastructure
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Infrastructure\Element
 * @internal
 */
class ElementTest extends TestCase
{
    public const TAG = 'test';

    /** @var Element */
    protected $fakeElement;

    protected function setUp(): void
    {
        $this->fakeElement = new class(mt_rand()) extends Element implements ElementInterface
        {
            protected const TAG = ElementTest::TAG;

            /** @var int */
            protected $value;

            public function __construct(int $value)
            {
                $this->value = $value;

                parent::__construct();
            }

            public function jsonSerialize(): array
            {
                return [];
            }

            public function tag(): string
            {
                return static::TAG;
            }

            public function getValue(): int
            {
                return $this->value;
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

    public function testMagicGet(): void
    {
        $this->assertNotNull($this->fakeElement->value);
        $this->expectException(\InvalidArgumentException::class);
        $this->fakeElement->invalidProperty;
    }
}
