<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait Work
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 *
 * @property-read  Ubki\Tests\Fakers\BaseFaker $faker
 */
trait Work
{
    protected function arguments(): array
    {
        return [
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\WorkTest::CREATED_AT),
            $this->faker->dictionary->language,
            Ubki\Tests\Unit\Data\Elements\WorkTest::ERGPOU,
            Ubki\Tests\Unit\Data\Elements\WorkTest::NAME,
            Ubki\Dictionaries\IdentifierRank::DIRECTOR(),
            Ubki\Tests\Unit\Data\Elements\WorkTest::EXPERIENCE,
            Ubki\Tests\Unit\Data\Elements\WorkTest::INCOME
        ];
    }
}
