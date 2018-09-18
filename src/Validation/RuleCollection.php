<?php

namespace Wearesho\Bobra\Ubki\Validation;

use Wearesho\Bobra\Ubki\Infrastructure\BaseCollection;

/**
 * Class RuleCollection
 * @package Wearesho\Bobra\Ubki\Validation
 *
 * @method merge(BaseCollection $collection): RuleCollection
 */
class RuleCollection extends BaseCollection
{
    public function type(): string
    {
        return RuleInterface::class;
    }
}
