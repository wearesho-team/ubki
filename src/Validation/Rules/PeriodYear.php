<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

use Wearesho\Bobra\Ubki\Validation\Rule;

/**
 * Class PeriodYear
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class PeriodYear extends Rule
{
    public function getMessage(): string
    {
        return 'Invalid year period: must be in {Y} format';
    }

    public function getPattern(): string
    {
        return '/(^[\d]{4}$)/u';
    }
}
