<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

/**
 * Class Inn
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class Inn extends Number
{
    public const LENGTH = 10;

    public function __construct(array $attributes, callable $userRule = null)
    {
        parent::__construct(static::LENGTH, $attributes, $userRule);
    }

    public function getMessage(): string
    {
        return 'Invalid inn number';
    }
}
