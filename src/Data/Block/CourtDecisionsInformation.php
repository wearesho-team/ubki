<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CourtDecisionsInformation
 * @package Wearesho\Bobra\Ubki\Data\BLocks
 */
class CourtDecisionsInformation extends Ubki\Infrastructure\Block implements
    Ubki\Data\Interfaces\CourtDecisionsInformation
{
    use Ubki\Data\Traits\CourtDecisionsInformation;

    public const ID = 3;

    public function __construct(Ubki\Data\Collection\CourtDecisions $decisionCollection)
    {
        $this->decisions = $decisionCollection;
    }
}
