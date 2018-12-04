<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class AddressTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Address
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

    /** @var Ubki\Data\Elements\Address */
    protected $fakeAddress;

    protected function setUp(): void
    {
        $this->fakeAddress = new Ubki\Data\Elements\Address(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionaries\Language::RUS(static::DESCRIPTION),
            Ubki\Dictionaries\AddressType::REGISTRATION(static::DESCRIPTION),
            static::COUNTRY,
            static::CITY,
            static::STREET,
            static::HOUSE,
            static::INDEX,
            static::STATE,
            static::AREA,
            Ubki\Dictionaries\CityType::SETTLEMENT(static::DESCRIPTION),
            static::CORPUS,
            static::FLAT,
            static::FULL_ADDRESS
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Ubki\Data\Interfaces\Address::TYPE => Ubki\Dictionaries\AddressType::REGISTRATION(static::DESCRIPTION),
                Ubki\Data\Interfaces\Address::CREATED_AT => Carbon::parse(static::CREATED_AT),
                Ubki\Data\Interfaces\Address::LANGUAGE => Ubki\Dictionaries\Language::RUS(static::DESCRIPTION),
                Ubki\Data\Interfaces\Address::AREA => static::AREA,
                Ubki\Data\Interfaces\Address::FULL_ADDRESS => static::FULL_ADDRESS,
                Ubki\Data\Interfaces\Address::COUNTRY => static::COUNTRY,
                Ubki\Data\Interfaces\Address::STREET => static::STREET,
                Ubki\Data\Interfaces\Address::CITY => static::CITY,
                Ubki\Data\Interfaces\Address::HOUSE => static::HOUSE,
                Ubki\Data\Interfaces\Address::CORPUS => static::CORPUS,
                Ubki\Data\Interfaces\Address::INDEX => static::INDEX,
                Ubki\Data\Interfaces\Address::STATE => static::STATE,
                Ubki\Data\Interfaces\Address::FLAT => static::FLAT,
                Ubki\Data\Interfaces\Address::CITY_TYPE => Ubki\Dictionaries\CityType::SETTLEMENT(static::DESCRIPTION),
            ],
            $this->fakeAddress->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Interfaces\Address::TAG,
            $this->fakeAddress->tag()
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
            Ubki\Dictionaries\AddressType::REGISTRATION(static::DESCRIPTION),
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
            Ubki\Dictionaries\Language::RUS(static::DESCRIPTION),
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
            Ubki\Dictionaries\CityType::SETTLEMENT(static::DESCRIPTION),
            $this->fakeAddress->getCityType()
        );
    }
}
