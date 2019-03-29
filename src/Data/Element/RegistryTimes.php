<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class RegistryTimes
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class RegistryTimes extends Ubki\Element implements Ubki\Data\Interfaces\RegistryTimes
{
    use Ubki\Data\Traits\RegistryTimes;

    public const TAG = 'reestrtime';

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
    }
}
