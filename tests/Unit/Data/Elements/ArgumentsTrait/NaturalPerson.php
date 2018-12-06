<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait NaturalPerson
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 *
 * @property-read Ubki\Tests\Fakers\BaseFaker $faker
 */
trait NaturalPerson
{
    protected function arguments(): array
    {
        return [
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\NaturalPersonTest::CREATED_AT),
            $this->faker->dictionary->language,
            Ubki\Tests\Unit\Data\Elements\NaturalPersonTest::NAME,
            Ubki\Tests\Unit\Data\Elements\NaturalPersonTest::SURNAME,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\NaturalPersonTest::BIRTH_DATE),
            Ubki\Dictionaries\Gender::MAN(),
            Ubki\Tests\Unit\Data\Elements\NaturalPersonTest::INN,
            Ubki\Tests\Unit\Data\Elements\NaturalPersonTest::PATRONYMIC,
            Ubki\Dictionaries\FamilyStatus::SINGLE(),
            Ubki\Dictionaries\Education::SECONDARY(),
            Ubki\Dictionaries\Nationality::RUSSIAN_FEDERATION(),
            Ubki\Dictionaries\RegistrationSpd::BUSINESS(),
            Ubki\Dictionaries\SocialStatus::STUDENT(),
            Ubki\Tests\Unit\Data\Elements\NaturalPersonTest::CHILDREN_COUNT
        ];
    }
}
