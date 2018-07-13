<?php

namespace Wearesho\Bobra\Ubki\Tests\Mocks;

/**
 * Class Element
 *
 * @package Wearesho\Bobra\Ubki\Tests\Mocks
 */
class Element
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
