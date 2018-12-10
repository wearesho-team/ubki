<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class TestCase
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks
 */
class TestCase extends Ubki\Tests\Unit\Data\TestCase
{
    /** @var Ubki\Infrastructure\Block */
    protected $element;

    public function testId()
    {
        $this->assertEquals($this->getExpectId(), $this->element->getId());
    }

    protected function getExpectTag(): string
    {
        return Ubki\Infrastructure\Block::TAG;
    }

    protected function getExpectId(): int
    {
        return null;
    }
}
