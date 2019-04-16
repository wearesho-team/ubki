<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class RegistryTimes
 * @package Wearesho\Bobra\Ubki\Data
 */
class RegistryTimes implements Ubki\Contract\Data\RegistryTimes, \JsonSerializable
{
    use Makeable, Tagable;

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

    public function jsonSerialize(): array
    {
        return [
            'byHour' => $this->byHour,
            'byDay' => $this->byDay,
            'byWeek' => $this->byWeek,
            'byMonth' => $this->byMonth,
            'byQuarter' => $this->byQuarter,
            'byYear' => $this->byYear,
            'byMoreYear' => $this->byMoreYear,
        ];
    }

    public static function tag(): string
    {
        return 'reestrtime';
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
