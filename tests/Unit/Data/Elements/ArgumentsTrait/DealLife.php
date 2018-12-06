<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait DealLife
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait DealLife
{
    protected function arguments(): array
    {
        return [
            Ubki\Tests\Unit\Data\Elements\DealLifeTest::ID,
            Ubki\Tests\Unit\Data\Elements\DealLifeTest::PERIOD_MONTH,
            Ubki\Tests\Unit\Data\Elements\DealLifeTest::PERIOD_YEAR,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\DealLifeTest::ISSUE_DATE),
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\DealLifeTest::END_DATE),
            Ubki\Dictionaries\DealStatus::CLOSE(),
            Ubki\Tests\Unit\Data\Elements\DealLifeTest::LIMIT,
            Ubki\Tests\Unit\Data\Elements\DealLifeTest::MANDATORY_PAYMENT,
            Ubki\Tests\Unit\Data\Elements\DealLifeTest::CURRENT_DEBT,
            Ubki\Tests\Unit\Data\Elements\DealLifeTest::CURRENT_OVERDUE_DEBT,
            Ubki\Tests\Unit\Data\Elements\DealLifeTest::OVERDUE_TIME,
            Ubki\Dictionaries\Flag::YES(),
            Ubki\Dictionaries\Flag::YES(),
            Ubki\Dictionaries\Flag::NO(),
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\DealLifeTest::PAYMENT_DATE),
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\DealLifeTest::ACTUAL_END_DATE)
        ];
    }
}
