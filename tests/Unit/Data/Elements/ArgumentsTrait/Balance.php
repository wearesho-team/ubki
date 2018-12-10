<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\BalanceTest;

/**
 * Trait Balance
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait Balance
{
    protected function arguments(): array
    {
        return [
            abs(mt_rand() / mt_rand()),
            Carbon::make(BalanceTest::DATE),
            BalanceTest::TIME,
        ];
    }
}
