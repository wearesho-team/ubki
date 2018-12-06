<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class NaturalPersonTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\NaturalPerson
 * @internal
 */
class NaturalPersonTest extends TestCase
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\NaturalPerson;

    protected const ELEMENT = Ubki\Data\Elements\NaturalPerson::class;

    public const CREATED_AT = '2018-03-12';
    public const NAME = 'testName';
    public const SURNAME = 'testSurname';
    public const BIRTH_DATE = '1998-03-12';
    public const INN = 'testInn';
    public const PATRONYMIC = 'testPatronymic';
    public const CHILDREN_COUNT = 2;

    protected function jsonKeys(): array
    {
        return [
            Ubki\Data\Interfaces\IdentifiedPerson::CREATED_AT,
            Ubki\Data\Interfaces\IdentifiedPerson::LANGUAGE,
            Ubki\Data\Interfaces\NaturalPerson::NAME,
            Ubki\Data\Interfaces\NaturalPerson::SURNAME,
            Ubki\Data\Interfaces\NaturalPerson::BIRTH_DATE,
            Ubki\Data\Interfaces\NaturalPerson::GENDER,
            Ubki\Data\Interfaces\NaturalPerson::INN,
            Ubki\Data\Interfaces\NaturalPerson::PATRONYMIC,
            Ubki\Data\Interfaces\NaturalPerson::FAMILY_STATUS,
            Ubki\Data\Interfaces\NaturalPerson::EDUCATION,
            Ubki\Data\Interfaces\NaturalPerson::NATIONALITY,
            Ubki\Data\Interfaces\NaturalPerson::REGISTRATION_SPD,
            Ubki\Data\Interfaces\NaturalPerson::SOCIAL_STATUS,
            Ubki\Data\Interfaces\NaturalPerson::CHILDREN_COUNT,
        ];
    }

    protected function getExpectTag(): string
    {
        return Ubki\Data\Interfaces\NaturalPerson::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'createdAt',
            'language',
            'name',
            'surname',
            'birthDate',
            'gender',
            'inn',
            'patronymic',
            'familyStatus',
            'education',
            'nationality',
            'registrationSpd',
            'socialStatus',
            'childrenCount',
        ];
    }
}
