<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class AddressTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data
 */
class AddressTest extends Ubki\Tests\Unit\TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const COUNTRY = 'testCountry';
    protected const CITY = 'testCity';
    protected const STREET = 'testStreet';
    protected const HOUSE = 'testHouse';
    protected const INDEX = '61166';
    protected const STATE = 'testState';
    protected const AREA = 'testArea';
    protected const CORPUS = 'testCorpus';
    protected const FLAT = 'testFlat';
    protected const FULL_ADDRESS = 'testFullAddress';

    /** @var Ubki\Data\Address */
    protected $address;

    protected function setUp(): void
    {
        $this->address = Ubki\Data\Address::make(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Address::HOME(),
            static::COUNTRY,
            static::CITY,
            static::STREET,
            static::HOUSE,
            static::INDEX,
            static::STATE,
            static::AREA,
            Ubki\Dictionary\City::TOWN(),
            static::CORPUS,
            static::FLAT,
            static::FULL_ADDRESS
        );
    }

    public function testTag(): void
    {
        $this->assertEquals('addr', $this->address::tag());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'createdAt' => Carbon::parse(static::CREATED_AT),
                'language' => Ubki\Dictionary\Language::ENG(),
                'addressType' => Ubki\Dictionary\Address::HOME(),
                'country' => static::COUNTRY,
                'city' => static::CITY,
                'street' => static::STREET,
                'house' => static::HOUSE,
                'index' => static::INDEX,
                'state' => static::STATE,
                'area' => static::AREA,
                'cityType' => Ubki\Dictionary\City::TOWN(),
                'corpus' => static::CORPUS,
                'flat' => static::FLAT,
                'fullAddress' => static::FULL_ADDRESS,
            ],
            $this->address->jsonSerialize()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(Carbon::parse(static::CREATED_AT), $this->address->getCreatedAt());
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(Ubki\Dictionary\Language::ENG(), $this->address->getLanguage());
    }

    public function testGetAddressType(): void
    {
        $this->assertEquals(Ubki\Dictionary\Address::HOME(), $this->address->getAddressType());
    }

    public function testGetCountry(): void
    {
        $this->assertEquals(static::COUNTRY, $this->address->getCountry());
    }

    public function testInvalidCountry(): void
    {
        $invalidCountry = ' invalidCountry+';
        $this->expectValidationException($invalidCountry, Ubki\Validator::COUNTRY());

        Ubki\Data\Address::make(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Address::HOME(),
            $invalidCountry,
            static::CITY,
            static::STREET,
            static::HOUSE
        );
    }

    public function testGetCityType(): void
    {
        $this->assertEquals(Ubki\Dictionary\City::TOWN(), $this->address->getCityType());
    }

    public function testGetHouse(): void
    {
        $this->assertEquals(static::HOUSE, $this->address->getHouse());
    }

    public function testInvalidHouse(): void
    {
        $invalidHouse = 'invalidHouse123-+';
        $this->expectValidationException($invalidHouse, Ubki\Validator::COUNTRY());

        Ubki\Data\Address::make(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Address::HOME(),
            static::COUNTRY,
            static::CITY,
            static::STREET,
            $invalidHouse
        );
    }

    public function testGetArea(): void
    {
        $this->assertEquals(static::AREA, $this->address->getArea());
    }

    public function testInvalidArea(): void
    {
        $invalidArea = 'invalidArea123';
        $this->expectValidationException($invalidArea, Ubki\Validator::ADDRESS_AREA());

        Ubki\Data\Address::make(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Address::HOME(),
            static::COUNTRY,
            static::CITY,
            static::STREET,
            static::HOUSE,
            static::INDEX,
            static::STATE,
            $invalidArea
        );
    }

    public function testGetIndex(): void
    {
        $this->assertEquals(static::INDEX, $this->address->getIndex());
    }

    public function testFailedIndex(): void
    {
        $invalidIndex = 'invalidIndex';
        $this->expectValidationException($invalidIndex, Ubki\Validator::INDEX());

        Ubki\Data\Address::make(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Address::HOME(),
            $invalidIndex,
            static::CITY,
            static::STREET,
            static::HOUSE,
            $invalidIndex
        );
    }

    public function testGetFlat(): void
    {
        $this->assertEquals(static::FLAT, $this->address->getFlat());
    }

    public function testInvalidFlat(): void
    {
        $invalidFlat = ' invalid flat123+';
        $this->expectValidationException($invalidFlat, Ubki\Validator::TEXT_40());

        Ubki\Data\Address::make(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Address::HOME(),
            static::COUNTRY,
            static::CITY,
            static::STREET,
            static::HOUSE,
            static::INDEX,
            static::STATE,
            static::AREA,
            Ubki\Dictionary\City::TOWN(),
            static::CORPUS,
            $invalidFlat
        );
    }

    public function testGetCorpus(): void
    {
        $this->assertEquals(static::CORPUS, $this->address->getCorpus());
    }

    public function testGetCity(): void
    {
        $this->assertEquals(static::CITY, $this->address->getCity());
    }

    public function testInvalidCity(): void
    {
        $invalidCity = 'invalidCity123-+';
        $this->expectValidationException($invalidCity, Ubki\Validator::CITY());

        Ubki\Data\Address::make(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Address::HOME(),
            static::COUNTRY,
            $invalidCity,
            static::STREET,
            static::HOUSE
        );
    }

    public function testGetStreet(): void
    {
        $this->assertEquals(static::STREET, $this->address->getStreet());
    }

    public function testInvalidStreet(): void
    {
        $invalidStreet = 'invalidStreet123-+';
        $this->expectValidationException($invalidStreet, Ubki\Validator::STREET());

        Ubki\Data\Address::make(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Address::HOME(),
            static::COUNTRY,
            static::CITY,
            $invalidStreet,
            static::HOUSE
        );
    }

    public function testGetState(): void
    {
        $this->assertEquals(static::STATE, $this->address->getState());
    }

    public function testInvalidState(): void
    {
        $invalidState = 'invalidState123';
        $this->expectValidationException($invalidState, Ubki\Validator::ADDRESS_STATE());

        Ubki\Data\Address::make(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Address::HOME(),
            static::COUNTRY,
            static::CITY,
            static::STREET,
            static::HOUSE,
            static::INDEX,
            $invalidState
        );
    }

    public function testGetFullAddress(): void
    {
        $this->assertEquals(static::FULL_ADDRESS, $this->address->getFullAddress());
    }

    public function testInvalidFullAddress(): void
    {
        $invalidFullAddress = ' invalid full address 123+';
        $this->expectValidationException($invalidFullAddress, Ubki\Validator::FULL_ADDRESS());

        Ubki\Data\Address::make(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Address::HOME(),
            static::COUNTRY,
            static::CITY,
            static::STREET,
            static::HOUSE,
            static::INDEX,
            static::STATE,
            static::AREA,
            Ubki\Dictionary\City::TOWN(),
            static::CORPUS,
            static::FLAT,
            $invalidFullAddress
        );
    }
}
