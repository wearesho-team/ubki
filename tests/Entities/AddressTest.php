<?php

namespace Wearesho\Bobra\Ubki\Tests\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Entities\Address;
use Wearesho\Bobra\Ubki\References;

/**
 * Class AddressTest
 * @package Wearesho\Bobra\Ubki\Tests\Entities
 * @coversDefaultClass Address
 * @internal
 */
class AddressTest extends TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const COUNTRY = 'testCountry';
    protected const LANGUAGE_TYPE = References\Language::RUS;
    protected const LANGUAGE_KEY = 'RUS';
    protected const CITY_TYPE = References\CityType::SETTLEMENT;
    protected const CITY_KEY = 'SETTLEMENT';
    protected const ADDRESS_TYPE = References\AddressType::REGISTRATION;
    protected const ADDRESS_KEY = 'REGISTRATION';
    protected const CITY = 'testCity';
    protected const STREET = 'testStreet';
    protected const HOUSE = 'testHouse';
    protected const INDEX = 61166;
    protected const STATE = 'testState';
    protected const AREA = 'testArea';
    protected const CORPUS = 'testCorpus';
    protected const FLAT = 'testFlat';
    protected const FULL_ADDRESS = 'testFullAddress';

    /** @var Address */
    protected $fakeAddress;

    protected function setUp(): void
    {
        $this->fakeAddress = new Address(
            Carbon::parse(static::CREATED_AT),
            new References\Language(static::LANGUAGE_TYPE),
            new References\AddressType(static::ADDRESS_TYPE),
            static::COUNTRY,
            static::CITY,
            static::STREET,
            static::HOUSE,
            static::INDEX,
            static::STATE,
            static::AREA,
            new References\CityType(static::CITY_TYPE),
            static::CORPUS,
            static::FLAT,
            static::FULL_ADDRESS
        );
    }

    public function testGetArea(): void
    {
        $this->assertEquals(
            static::AREA,
            $this->fakeAddress->getArea()
        );
    }

    public function testGetCorpus(): void
    {
        $this->assertEquals(
            static::CORPUS,
            $this->fakeAddress->getCorpus()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            new References\Language(static::LANGUAGE_TYPE),
            $this->fakeAddress->getLanguage()
        );
    }

    public function testGetState(): void
    {
        $this->assertEquals(
            static::STATE,
            $this->fakeAddress->getState()
        );
    }

    public function testGetFlat(): void
    {
        $this->assertEquals(
            static::FLAT,
            $this->fakeAddress->getFlat()
        );
    }

    public function testGetStreet(): void
    {
        $this->assertEquals(
            static::STREET,
            $this->fakeAddress->getStreet()
        );
    }

    public function testGetCountry(): void
    {
        $this->assertEquals(
            static::COUNTRY,
            $this->fakeAddress->getCountry()
        );
    }

    public function testGetFullAddress(): void
    {
        $this->assertEquals(
            static::FULL_ADDRESS,
            $this->fakeAddress->getFullAddress()
        );
    }

    public function testGetAddressType(): void
    {
        $this->assertEquals(
            new References\AddressType(static::ADDRESS_TYPE),
            $this->fakeAddress->getAddressType()
        );
    }

    public function testGetCityType(): void
    {
        $this->assertEquals(
            new References\CityType(static::CITY_TYPE),
            $this->fakeAddress->getCityType()
        );
    }

    public function testGetHouse(): void
    {
        $this->assertEquals(
            static::HOUSE,
            $this->fakeAddress->getHouse()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            static::CREATED_AT,
            Carbon::instance($this->fakeAddress->getCreatedAt())->toDateString()
        );
    }

    public function testGetCity(): void
    {
        $this->assertEquals(
            static::CITY,
            $this->fakeAddress->getCity()
        );
    }

    public function testGetIndex(): void
    {
        $this->assertEquals(
            static::INDEX,
            $this->fakeAddress->getIndex()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'createdAt' => static::CREATED_AT,
                'language' => static::LANGUAGE_KEY,
                'type' => static::ADDRESS_KEY,
                'country' => static::COUNTRY,
                'city' => static::CITY,
                'street' => static::STREET,
                'house' => static::HOUSE,
                'index' => static::INDEX,
                'state' => static::STATE,
                'area' => static::AREA,
                'cityType' => static::CITY_KEY,
                'corpus' => static::CORPUS,
                'flat' => static::FLAT,
                'fullAddress' => static::FULL_ADDRESS
            ],
            $this->fakeAddress->jsonSerialize()
        );
    }
}
