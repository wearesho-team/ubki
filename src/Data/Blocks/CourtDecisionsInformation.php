<?php

namespace Wearesho\Bobra\Ubki\Data\BLocks;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Data\Collections\CourtDecisions;

/**
 * Class CourtDecisionsInformation
 * @package Wearesho\Bobra\Ubki\Data\BLocks
 */
class CourtDecisionsInformation extends Block
{
    public const ID = 3;

    /** @var CourtDecisions */
    protected $decisionCollection;

    public function __construct(CourtDecisions $decisionCollection)
    {
        $this->decisionCollection = $decisionCollection;
    }

    public function getDecisionCollection(): CourtDecisions
    {
        return $this->decisionCollection;
    }

    public function jsonSerialize(): array
    {
        return $this->decisionCollection->jsonSerialize();
    }
}
