<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

/**
 * Class RangeNumber
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class RangeNumber extends Number
{
    public function getMessage(): string
    {
        return "Number must be in range between 1 and {$this->getLength()} digits";
    }

    public function getPattern(): string
    {
        return "/(^\d{1,{$this->getLength()}}$)/u";
    }
}
