<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface CourtDecisionsInformation
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface CourtDecisionsInformation extends Ubki\ElementInterface
{
    public function getDecisions(): Ubki\Data\Collection\CourtDecisions;
}
