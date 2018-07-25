<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class InsuranceReport
 * @package Wearesho\Bobra\Ubki\Block
 */
class InsuranceReport extends Ubki\Block
{
    public const ID = 9;

    protected $reports;

    // todo: refactor after implementing Insurance report element
    public function __construct($reports)
    {
        $this->reports = $reports;
    }

    public function getReports()
    {
        return $this->reports;
    }
}
