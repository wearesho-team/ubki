<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class CourtDecisions
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class CourtDecisions extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\CourtDecision::class;
    }
}
