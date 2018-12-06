<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait Contact
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait Contact
{
    protected function arguments(): array
    {
        return [
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\ContactTest::CREATED_AT),
            Ubki\Tests\Unit\Data\Elements\ContactTest::VALUE,
            Ubki\Dictionaries\ContactType::FAX(),
            Ubki\Tests\Unit\Data\Elements\ContactTest::INN
        ];
    }
}
