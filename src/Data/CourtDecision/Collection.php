<?php

namespace Wearesho\Bobra\Ubki\Data\CourtDecision;

use Wearesho\Bobra\Ubki\BaseCollection;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Data\CourtDecision
 */
class Collection extends BaseCollection
{
    public function type(): string
    {
        return Entity::class;
    }
}
