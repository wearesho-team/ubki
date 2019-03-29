<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait CourtDecisionsInformation
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait CourtDecisionsInformation
{
    /** @var Ubki\Data\Collection\CourtDecisions */
    protected $decisions;

    public function getDecisions(): Ubki\Data\Collection\CourtDecisions
    {
        return $this->decisions;
    }
}
