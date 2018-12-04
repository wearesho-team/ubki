<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class CourtDecisionsInformation
 * @package Wearesho\Bobra\Ubki\Data\BLocks
 */
class CourtDecisionsInformation extends Ubki\Infrastructure\Block
{
    public const ID = 3;

    /** @var Ubki\Data\Collections\CourtDecisions */
    protected $decisionCollection;

    public function __construct(Ubki\Data\Collections\CourtDecisions $decisionCollection)
    {
        $this->decisionCollection = $decisionCollection;
    }

    public function getDecisionCollection(): Ubki\Data\Collections\CourtDecisions
    {
        return $this->decisionCollection;
    }

    public function jsonSerialize(): array
    {
        return $this->decisionCollection->jsonSerialize();
    }
}
