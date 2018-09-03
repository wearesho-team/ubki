<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class CourtDecisions
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class CourtDecisions extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\CourtDecision::class;
    }
}
