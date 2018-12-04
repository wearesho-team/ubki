<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class AddressTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Address
 * @internal
 */
class AddressTest extends TestCase
{
    protected const ELEMENT = Ubki\Data\Elements\Address::class;

    protected const CREATED_AT = '2018-03-12';
    protected const COUNTRY = 'testCountry';
    protected const CITY = 'testCity';
    protected const STREET = 'testStreet';
    protected const HOUSE = 'testHouse';
    protected const INDEX = 'testIndex';
    protected const STATE = 'testState';
    protected const AREA = 'testArea';
    protected const CORPUS = 'testCorpus';
    protected const FLAT = 'testFlat';
    protected const FULL_ADDRESS = 'testFullAddress';

    protected function arguments(): array
    {
        return [
            Carbon::make(static::CREATED_AT),
            Ubki\Dictionaries\Language::ENG(),
            Ubki\Dictionaries\AddressType::HOME(),
            static::COUNTRY,
            static::CITY,
            static::STREET,
            static::HOUSE,
            static::INDEX,
            static::STATE,
            static::AREA,
            Ubki\Dictionaries\CityType::TOWN(),
            static::CORPUS,
            static::FLAT,
            static::FULL_ADDRESS
        ];
    }

    protected function expectTag(): string
    {
        return Ubki\Data\Interfaces\Address::TAG;
    }

    protected function getExpectJson(): array
    {
        return array_combine([
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
        ], $this->arguments());
    }

    protected function getAttributesGetters(): array
    {
        return array_combine([
            'getCreatedAt',
            'getLanguage',
            'getAddressType',
            'getCountry',
            'getCity',
            'getStreet',
            'getHouse',
            'getIndex',
            'getState',
            'getArea',
            'getCityType',
            'getCorpus',
            'getFlat',
            'getFullAddress',
        ], $this->arguments());
    }
}
