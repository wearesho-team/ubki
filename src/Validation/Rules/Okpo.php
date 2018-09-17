<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

use Wearesho\Bobra\Ubki\Validation\Rule;

/**
 * Class Okpo
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class Okpo extends Rule
{
    public function getMessage(): string
    {
        return 'Value must be 8 or 10 digits length';
    }

    public function getPattern(): string
    {
        return '/(^\d{8}|\d{10}$)/u';
    }
}
