<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait Document
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 *
 * @property-read Ubki\Tests\Fakers\BaseFaker $faker
 */
trait Document
{
    protected function arguments(): array
    {
        return [
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\DocumentTest::CREATED_AT),
            $this->faker->dictionary->language,
            Ubki\Dictionaries\DocumentType::DIPLOMA(),
            Ubki\Tests\Unit\Data\Elements\DocumentTest::SERIAL,
            Ubki\Tests\Unit\Data\Elements\DocumentTest::NUMBER,
            Ubki\Tests\Unit\Data\Elements\DocumentTest::ISSUE,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\DocumentTest::ISSUE_DATE),
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\DocumentTest::TERMIN)
        ];
    }
}
