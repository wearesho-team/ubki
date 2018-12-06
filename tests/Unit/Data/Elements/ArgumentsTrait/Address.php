<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait Address
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 *
 * @property-read Ubki\Tests\Fakers\BaseFaker $faker
 */
trait Address
{
    protected function arguments(): array
    {
        return [
            Carbon::make(Ubki\Tests\Unit\Data\Elements\AddressTest::CREATED_AT),
            $this->faker->dictionary->language,
            $this->faker->dictionary->addressType,
            Ubki\Tests\Unit\Data\Elements\AddressTest::COUNTRY,
            Ubki\Tests\Unit\Data\Elements\AddressTest::CITY,
            Ubki\Tests\Unit\Data\Elements\AddressTest::STREET,
            Ubki\Tests\Unit\Data\Elements\AddressTest::HOUSE,
            Ubki\Tests\Unit\Data\Elements\AddressTest::INDEX,
            Ubki\Tests\Unit\Data\Elements\AddressTest::STATE,
            Ubki\Tests\Unit\Data\Elements\AddressTest::AREA,
            $this->faker->dictionary->cityType,
            Ubki\Tests\Unit\Data\Elements\AddressTest::CORPUS,
            Ubki\Tests\Unit\Data\Elements\AddressTest::FLAT,
            Ubki\Tests\Unit\Data\Elements\AddressTest::FULL_ADDRESS
        ];
    }
}
