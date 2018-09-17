<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

use Wearesho\Bobra\Ubki\Validation\Rule;

/**
 * Class Number
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 *
 * @method static static verify(array $attributes)
 */
class Number extends Rule
{
    /** @var int */
    protected $length;

    public function length(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getMessage(): string
    {
        return 'Number must be in 10 digits length';
    }

    public function getPattern(): string
    {
        return "/^\d{{$this->getLength()}}$/u";
    }

    public function getLength(): int
    {
        return $this->length;
    }
}
