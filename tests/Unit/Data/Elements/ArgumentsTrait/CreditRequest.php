<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait CreditRequest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait CreditRequest
{
    protected function arguments(): array
    {
        return [
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\CreditRequestTest::DATE),
            Ubki\Tests\Unit\Data\Elements\CreditRequestTest::INN,
            Ubki\Tests\Unit\Data\Elements\CreditRequestTest::ID,
            Ubki\Dictionaries\Decision::POSITIVE(),
            Ubki\Dictionaries\RequestReason::EXPORT(),
            Ubki\Tests\Unit\Data\Elements\CreditRequestTest::ORGANIZATION
        ];
    }
}
