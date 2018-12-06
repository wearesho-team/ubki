<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class CredentialTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Credential
 * @internal
 */
class CredentialTest extends TestCase
{
    use ArgumentsTrait\Credential;

    protected const ELEMENT = Ubki\Data\Elements\Credential::class;

    public const NAME = 'testName';
    public const INN = 'testInn';
    public const PATRONYMIC = 'testPatronymic';
    public const SURNAME = 'testSurname';
    public const BIRTH_DATE = '1998-03-12';

    protected function jsonKeys(): array
    {
        return [
            Ubki\Data\Interfaces\Credential::LANGUAGE,
            Ubki\Data\Interfaces\Credential::NAME,
            Ubki\Data\Interfaces\Credential::PATRONYMIC,
            Ubki\Data\Interfaces\Credential::SURNAME,
            Ubki\Data\Interfaces\Credential::BIRTH_DATE,
            'identifiers',
            'documents',
            'addresses',
            Ubki\Data\Interfaces\Credential::INN,
            'works',
            'photos',
            'linkedPersons',
        ];
    }

    protected function getExpectTag(): string
    {
        return Ubki\Data\Interfaces\Credential::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'language',
            'name',
            'patronymic',
            'surname',
            'birthDate',
            'identifiers',
            'documents',
            'addresses',
            'inn',
            'works',
            'photos',
            'linkedPersons',
        ];
    }
}
