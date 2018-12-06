<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class AddressTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Address
 * @internal
 */
class AddressTest extends TestCase
{
    use ArgumentsTrait\Address;

    protected const ELEMENT = Ubki\Data\Elements\Address::class;

    public const CREATED_AT = '2018-03-12';
    public const COUNTRY = 'testCountry';
    public const CITY = 'testCity';
    public const STREET = 'testStreet';
    public const HOUSE = 'testHouse';
    public const INDEX = 'testIndex';
    public const STATE = 'testState';
    public const AREA = 'testArea';
    public const CORPUS = 'testCorpus';
    public const FLAT = 'testFlat';
    public const FULL_ADDRESS = 'testFullAddress';

    protected function getExpectTag(): string
    {
        return Ubki\Data\Interfaces\Address::TAG;
    }

    protected function jsonKeys(): array
    {
        return [
            Ubki\Data\Interfaces\Address::CREATED_AT,
            Ubki\Data\Interfaces\Address::LANGUAGE,
            Ubki\Data\Interfaces\Address::TYPE,
            Ubki\Data\Interfaces\Address::COUNTRY,
            Ubki\Data\Interfaces\Address::CITY,
            Ubki\Data\Interfaces\Address::STREET,
            Ubki\Data\Interfaces\Address::HOUSE,
            Ubki\Data\Interfaces\Address::INDEX,
            Ubki\Data\Interfaces\Address::STATE,
            Ubki\Data\Interfaces\Address::AREA,
            Ubki\Data\Interfaces\Address::CITY_TYPE,
            Ubki\Data\Interfaces\Address::CORPUS,
            Ubki\Data\Interfaces\Address::FLAT,
            Ubki\Data\Interfaces\Address::FULL_ADDRESS,
        ];
    }

    protected function attributesNames(): array
    {
        return [
            'createdAt',
            'language',
            'addressType',
            'country',
            'city',
            'street',
            'house',
            'index',
            'state',
            'area',
            'cityType',
            'corpus',
            'flat',
            'fullAddress',
        ];
    }
}
