<?php

namespace Wearesho\Bobra\Ubki\Blocks;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Blocks\Collections\CourtDecisions;

/**
 * Class CourtDecisionsInformation
 * @package Wearesho\Bobra\Ubki\Blocks
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
}
