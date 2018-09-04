<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Data\Collections\CourtDecisions;

/**
 * Class CourtDecisionsInformation
 * @package Wearesho\Bobra\Ubki\Data
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
        return [
            'courtReports' => array_map(function (Interfaces\CourtDecision $courtDecision) {
                return $courtDecision->jsonSerialize();
            }, $this->decisionCollection->jsonSerialize())
        ];
    }
}
