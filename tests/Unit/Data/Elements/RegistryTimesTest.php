<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class RegistryTimesTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\RegistryTimes
 * @internal
 */
class RegistryTimesTest extends Ubki\Tests\Unit\Data\TestCase
{
    use ArgumentsTrait\RegistryTimes;

    protected const ELEMENT = Ubki\Data\Elements\RegistryTimes::class;

    public const BY_HOUR = 1;
    public const BY_DAY = 2;
    public const BY_WEEK = 3;
    public const BY_MONTH = 4;
    public const BY_QUARTER = 5;
    public const BY_YEAR = 10;
    public const BY_MORE_YEAR = 200;

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
