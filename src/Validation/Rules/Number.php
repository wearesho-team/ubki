<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

use Wearesho\Bobra\Ubki\Validation\Rule;

/**
 * Class Number
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class Number extends Rule
{
    /** @var int */
    protected $length;

    public function __construct(int $length, array $attributes, callable $userRule = null)
    {
        $this->length = $length;

        parent::__construct($attributes, $userRule);
    }

    public function getMessage(): string
    {
        return "Number must be in {$this->getLength()} digits length";
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
