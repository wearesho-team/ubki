<?php

namespace Wearesho\Bobra\Ubki\Tests\Mocks;

use Wearesho\Bobra\Ubki;

/**
 * Class Element
 * @package Wearesho\Bobra\Ubki\Tests\Mocks
 */
class Element extends Ubki\Element
{
    public const TAG = 'mock';

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
