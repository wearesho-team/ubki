<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Data\Elements;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class AddressTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass Elements\Address
 * @internal
 */
class AddressTest extends TestCase
{
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
    protected const DESCRIPTION = 'testDescription';

    /** @var Elements\Address */
    protected $fakeAddress;

    protected function setUp(): void
    {
        $this->fakeAddress = new Elements\Address(
            Carbon::parse(static::CREATED_AT),
            Dictionaries\Language::RUS(static::DESCRIPTION),
            Dictionaries\AddressType::REGISTRATION(static::DESCRIPTION),
            static::COUNTRY,
            static::CITY,
            static::STREET,
            static::HOUSE,
            static::INDEX,
            static::STATE,
            static::AREA,
            Dictionaries\CityType::SETTLEMENT(static::DESCRIPTION),
            static::CORPUS,
            static::FLAT,
            static::FULL_ADDRESS
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Interfaces\Address::TYPE => Dictionaries\AddressType::REGISTRATION()->getValue(),
                Interfaces\Address::TYPE_REF => static::DESCRIPTION,
                Interfaces\Address::CREATED_AT => static::CREATED_AT,
                Interfaces\Address::LANGUAGE => Dictionaries\Language::RUS()->getValue(),
                Interfaces\Address::LANGUAGE_REF => static::DESCRIPTION,
                Interfaces\Address::AREA => static::AREA,
                Interfaces\Address::FULL_ADDRESS => static::FULL_ADDRESS,
                Interfaces\Address::COUNTRY => static::COUNTRY,
                Interfaces\Address::STREET => static::STREET,
                Interfaces\Address::CITY => static::CITY,
                Interfaces\Address::HOUSE => static::HOUSE,
                Interfaces\Address::CORPUS => static::CORPUS,
                Interfaces\Address::INDEX => static::INDEX,
                Interfaces\Address::STATE => static::STATE,
                Interfaces\Address::FLAT => static::FLAT,
                Interfaces\Address::CITY_TYPE => Dictionaries\CityType::SETTLEMENT()->getValue(),
                Interfaces\Address::CITY_TYPE_REF => static::DESCRIPTION,
            ],
            $this->fakeAddress->jsonSerialize()
        );
    }

    public function testGetFlat(): void
    {
        $this->assertEquals(
            static::FLAT,
            $this->fakeAddress->getFlat()
        );
    }

    public function testGetCity(): void
    {
        $this->assertEquals(
            static::CITY,
            $this->fakeAddress->getCity()
        );
    }

    public function testGetState(): void
    {
        $this->assertEquals(
            static::STATE,
            $this->fakeAddress->getState()
        );
    }

    public function testGetArea(): void
    {
        $this->assertEquals(
            static::AREA,
            $this->fakeAddress->getArea()
        );
    }

    public function testGetIndex(): void
    {
        $this->assertEquals(
            static::INDEX,
            $this->fakeAddress->getIndex()
        );
    }

    public function testGetCorpus(): void
    {
        $this->assertEquals(
            static::CORPUS,
            $this->fakeAddress->getCorpus()
        );
    }

    public function testGetAddressType(): void
    {
        $this->assertEquals(
            Dictionaries\AddressType::REGISTRATION(static::DESCRIPTION),
            $this->fakeAddress->getAddressType()
        );
    }

    public function testGetHouse(): void
    {
        $this->assertEquals(
            static::HOUSE,
            $this->fakeAddress->getHouse()
        );
    }

    public function testGetStreet(): void
    {
        $this->assertEquals(
            static::STREET,
            $this->fakeAddress->getStreet()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            static::CREATED_AT,
            Carbon::instance($this->fakeAddress->getCreatedAt())->toDateString()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            Dictionaries\Language::RUS(static::DESCRIPTION),
            $this->fakeAddress->getLanguage()
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

    public function testGetCityType(): void
    {
        $this->assertEquals(
            Dictionaries\CityType::SETTLEMENT(static::DESCRIPTION),
            $this->fakeAddress->getCityType()
        );
    }
}
