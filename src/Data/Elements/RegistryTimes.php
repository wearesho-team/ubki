<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Class RegistryTimes
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class RegistryTimes extends Element implements Data\Interfaces\RegistryTimes
{
    use Data\Traits\RegistryTimes;

    public function __construct(
        int $byHour,
        int $byDay,
        int $byWeek,
        int $byMonth,
        int $byQuarter,
        int $byYear,
        int $byMoreYear
    ) {
        $this->byHour = $byHour;
        $this->byDay = $byDay;
        $this->byWeek = $byWeek;
        $this->byMonth = $byMonth;
        $this->byQuarter = $byQuarter;
        $this->byYear = $byYear;
        $this->byMoreYear = $byMoreYear;

        parent::__construct();
    }
}
