<?php

namespace Wearesho\Bobra\Ubki\Tests\Mocks;

/**
 * Class ElementMock
 *
 * @package Wearesho\Bobra\Ubki\Tests\Mocks
 */
class ElementMock
{
    /** @var int */
    protected $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
