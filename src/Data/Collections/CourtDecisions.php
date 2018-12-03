<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class CourtDecisions
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class CourtDecisions extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\CourtDecision::class;
    }
}
