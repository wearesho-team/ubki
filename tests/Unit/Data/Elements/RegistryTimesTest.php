<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class RegistryTimesTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\RegistryTimes
 * @internal
 */
class RegistryTimesTest extends TestCase
{
    use ArgumentsTrait\RegistryTimes;

    protected const ELEMENT = Ubki\Data\Elements\RegistryTimes::class;

    protected const BY_HOUR = 1;
    protected const BY_DAY = 2;
    protected const BY_WEEK = 3;
    protected const BY_MONTH = 4;
    protected const BY_QUARTER = 5;
    protected const BY_YEAR = 10;
    protected const BY_MORE_YEAR = 200;

    protected function jsonKeys(): array
    {
        return [
            Ubki\Data\Interfaces\RegistryTimes::BY_HOUR,
            Ubki\Data\Interfaces\RegistryTimes::BY_DAY,
            Ubki\Data\Interfaces\RegistryTimes::BY_WEEK,
            Ubki\Data\Interfaces\RegistryTimes::BY_MONTH,
            Ubki\Data\Interfaces\RegistryTimes::BY_QUARTER,
            Ubki\Data\Interfaces\RegistryTimes::BY_YEAR,
            Ubki\Data\Interfaces\RegistryTimes::BY_MORE_YEAR,
        ];
    }

    protected function getExpectTag(): string
    {
        return Ubki\Data\Interfaces\RegistryTimes::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'byHour',
            'byDay',
            'byWeek',
            'byMonth',
            'byQuarter',
            'byYear',
            'byMoreYear',
        ];
    }
}
