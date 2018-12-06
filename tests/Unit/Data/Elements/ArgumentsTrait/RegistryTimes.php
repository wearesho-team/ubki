<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\RegistryTimesTest;

/**
 * Trait RegistryTimes
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait RegistryTimes
{
    protected function arguments(): array
    {
        return [
            RegistryTimesTest::BY_HOUR,
            RegistryTimesTest::BY_DAY,
            RegistryTimesTest::BY_WEEK,
            RegistryTimesTest::BY_MONTH,
            RegistryTimesTest::BY_QUARTER,
            RegistryTimesTest::BY_YEAR,
            RegistryTimesTest::BY_MORE_YEAR
        ];
    }
}
