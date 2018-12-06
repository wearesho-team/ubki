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

    /** @var array */
    protected $data;

    protected function setUp(): void
    {
        parent::setUp();

        $this->data = $this->arguments();
        $this->element = $this->faker->element
            ->with($this->data)
            ->make(static::ELEMENT);
    }

    public function testTag(): void
    {
        $this->assertEquals($this->getExpectTag(), $this->element->tag());
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            array_combine($this->jsonKeys(), $this->data),
            $this->element->jsonSerialize()
        );
    }

    public function testGetters(): void
    {
        foreach (array_combine($this->attributesNames(), $this->data) as $getter => $expectValue) {
            $this->assertEquals($expectValue, $this->element->{'get' . $getter}());
        }
    }

    protected function jsonKeys(): array
    {
        return [];
    }

    protected function attributesNames(): array
    {
        return [];
    }

    protected function arguments(): array
    {
        return [];
    }

    protected function getExpectTag(): string
    {
        return null;
    }
}
