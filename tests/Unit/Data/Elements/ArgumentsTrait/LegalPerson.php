<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait LegalPerson
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 *
 * @property-read Ubki\Tests\Fakers\BaseFaker $faker
 */
trait LegalPerson
{
    protected function arguments(): array
    {
        return [
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\LegalPersonTest::CREATED_AT),
            $this->faker->dictionary->language,
            Ubki\Tests\Unit\Data\Elements\LegalPersonTest::NAME,
            Ubki\Tests\Unit\Data\Elements\LegalPersonTest::ERGPOU,
            Ubki\Tests\Unit\Data\Elements\LegalPersonTest::FORM,
            Ubki\Tests\Unit\Data\Elements\LegalPersonTest::ECONOMY_BRANCH,
            Ubki\Tests\Unit\Data\Elements\LegalPersonTest::ACTIVITY_TYPE,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\LegalPersonTest::EDR_REGISTRATION_DATE),
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\LegalPersonTest::TAX_REGISTRATION_DATE)
        ];
    }
}
