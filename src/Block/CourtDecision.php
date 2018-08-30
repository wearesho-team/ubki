<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CourtDecision
 * @package Wearesho\Bobra\Ubki\Block
 */
class CourtDecision extends Ubki\Block
{
    public const ID = 2;

    protected $decisions;

    // todo: refactor after implementation of Court decision element
    public function __construct($decisions)
    {
        $this->decisions = $decisions;
    }

    public function getDecisions()
    {
        return $this->decisions;
    }
}
