<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class RegistryTimes
 * @package Wearesho\Bobra\Ubki\Data
 */
class RegistryTimes extends Ubki\Element
{
    public const TAG = 'reestrtime';

    public const BY_HOUR = 'hr';
    public const BY_DAY = 'da';
    public const BY_WEEK = 'wk';
    public const BY_MONTH = 'mn';
    public const BY_QUARTER = 'qw';
    public const BY_YEAR = 'ye';
    public const BY_MORE_YEAR = 'yu';

    /** @var int */
    protected $byHour;

    /** @var int */
    protected $byDay;

    /** @var int */
    protected $byWeek;

    /** @var int */
    protected $byMonth;

    /** @var int */
    protected $byQuarter;

    /** @var int */
    protected $byYear;

    /** @var int */
    protected $byMoreYear;

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

    public function getByHour(): int
    {
        return $this->byHour;
    }

    public function getByDay(): int
    {
        return $this->byDay;
    }

    public function getByWeek(): int
    {
        return $this->byWeek;
    }

    public function getByMonth(): int
    {
        return $this->byMonth;
    }

    public function getByQuarter(): int
    {
        return $this->byQuarter;
    }

    public function getByYear(): int
    {
        return $this->byYear;
    }

    public function getByMoreYear(): int
    {
        return $this->byMoreYear;
    }

    public function associativeAttributes(): array
    {
        return [
            RegistryTimes::BY_DAY => $this->getByDay(),
            RegistryTimes::BY_HOUR => $this->getByHour(),
            RegistryTimes::BY_MONTH => $this->getByMonth(),
            RegistryTimes::BY_MORE_YEAR => $this->getByMoreYear(),
            RegistryTimes::BY_QUARTER => $this->getByQuarter(),
            RegistryTimes::BY_WEEK => $this->getByWeek(),
            RegistryTimes::BY_YEAR => $this->getByYear(),
        ];
    }
}
