<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Class TestCase
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 */
class TestCase extends \Wearesho\Bobra\Ubki\Tests\TestCase
{
    protected const ELEMENT = null;

    /** @var Element */
    protected $element;

    protected function setUp(): void
    {
        parent::setUp();

        $this->element = $this->elementFaker->with($this->arguments())->{static::ELEMENT};
    }

    public function testTag(): void
    {
        $this->assertEquals($this->expectTag(), $this->element->tag());
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset($this->getExpectJson(), $this->element->jsonSerialize());
    }

    public function testGetters(): void
    {
        foreach ($this->getAttributesGetters() as $getter => $expectValue) {
            $this->assertEquals($expectValue, $this->element->{$getter}());
        }
    }

    protected function getExpectJson(): array
    {
        return [];
    }

    protected function getAttributesGetters(): array
    {
        return [];
    }

    protected function arguments(): array
    {
        return [];
    }

    protected function expectTag(): string
    {
        return null;
    }
}
