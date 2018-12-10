<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class IdentificationPersonTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\IdentificationPerson
 * @internal
 */
class IdentificationPersonTest extends Ubki\Tests\Unit\Data\TestCase
{
    use ArgumentsTrait\IdentificationPerson;

    protected const ELEMENT = Ubki\Data\Elements\IdentificationPerson::class;

    public const NAME = 'testName';
    public const INN = 'testInn';
    public const SURNAME = 'testSurname';
    public const PATRONYMIC = 'testPatronymic';
    public const BIRTH_DATE = '2018-03-12';
    public const ORGANIZATION = 'testOrganization';

    protected function getExpectTag(): string
    {
        return Ubki\Data\Interfaces\IdentificationPerson::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'name',
            'inn',
            'surname',
            'patronymic',
            'birthDate',
            'organization',
        ];
    }
}
