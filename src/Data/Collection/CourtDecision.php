<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class CourtDecision
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class CourtDecision extends BaseCollection
{
    public function type(): string
    {
        return Data\CourtDecision::class;
    }
}
