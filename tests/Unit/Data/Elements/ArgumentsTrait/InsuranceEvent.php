<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait InsuranceEvent
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait InsuranceEvent
{
    protected function arguments(): array
    {
        return [
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\InsuranceEventTest::REQUEST_DATE),
            Ubki\Dictionaries\InsuranceDecisionStatus::POSITIVE(),
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\InsuranceEventTest::DECISION_DATE)
        ];
    }
}
