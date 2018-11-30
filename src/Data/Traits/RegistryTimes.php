<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Trait RegistryTimes
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait RegistryTimes
{
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

    public function jsonSerialize(): array
    {
        return [
            Interfaces\RegistryTimes::BY_HOUR => $this->byHour,
            Interfaces\RegistryTimes::BY_DAY => $this->byDay,
            Interfaces\RegistryTimes::BY_WEEK => $this->byWeek,
            Interfaces\RegistryTimes::BY_MONTH => $this->byMonth,
            Interfaces\RegistryTimes::BY_QUARTER => $this->byQuarter,
            Interfaces\RegistryTimes::BY_YEAR => $this->byYear,
            Interfaces\RegistryTimes::BY_MORE_YEAR => $this->byMoreYear,
        ];
    }

    public function tag(): string
    {
        return Interfaces\RegistryTimes::TAG;
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
}
