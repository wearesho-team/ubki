<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CourtDecisionsInformation
 * @package Wearesho\Bobra\Ubki\Data\BLocks
 */
class CourtDecisionsInformation extends Ubki\Block
{
    public const ID = 3;

    /** @var Ubki\Data\Collection\CourtDecision */
    protected $decisions;

    public function __construct(Ubki\Data\Collection\CourtDecision $decisionCollection)
    {
        $this->decisions = $decisionCollection;
    }

    public function getDecisions(): Ubki\Data\Collection\CourtDecision
    {
        return $this->decisions;
    }
}
