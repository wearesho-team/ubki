<?php

namespace Wearesho\Bobra\Ubki\Validation;

use Wearesho\Bobra\Ubki\Infrastructure\BaseCollection;

/**
 * Class RuleCollection
 * @package Wearesho\Bobra\Ubki\Validation
 */
class RuleCollection extends BaseCollection
{
    public function type(): string
    {
        return Rule::class;
    }
}
