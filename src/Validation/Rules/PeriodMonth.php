<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

use Wearesho\Bobra\Ubki\Validation\Rule;

/**
 * Class PeriodMonth
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class PeriodMonth extends Rule
{
    public function getMessage(): string
    {
        return 'Period month be in range 1 and 12';
    }

    public function getPattern(): string
    {
        return '/^([1-9]{1}|[012]{2})$/u';
    }
}
