<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Entities\Address;
use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\References;

/**
 * Class AddressTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks\Entities
 * @coversDefaultClass Address
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

    /** @var Address */
    protected $fakeAddress;

    protected function setUp(): void
    {
        $this->fakeAddress = new Address(
            Carbon::parse(static::CREATED_AT),
            References\Language::RUS(),
            References\AddressType::REGISTRATION(),
            static::COUNTRY,
            static::CITY,
            static::STREET,
            static::HOUSE,
            static::INDEX,
            static::STATE,
            static::AREA,
            References\CityType::SETTLEMENT(),
            static::CORPUS,
            static::FLAT,
            static::FULL_ADDRESS
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'createdAt' => static::CREATED_AT,
                'language' => References\Language::RUS()->getKey(),
                'type' => References\AddressType::REGISTRATION()->getKey(),
                'country' => static::COUNTRY,
                'city' => static::CITY,
                'street' => static::STREET,
                'house' => static::HOUSE,
                'index' => static::INDEX,
                'state' => static::STATE,
                'area' => static::AREA,
                'cityType' => References\CityType::SETTLEMENT()->getKey(),
                'corpus' => static::CORPUS,
                'flat' => static::FLAT,
                'fullAddress' => static::FULL_ADDRESS
            ],
            $this->fakeAddress->jsonSerialize()
        );
    }

    public function testInstanceOf(): void
    {
        $this->assertTrue($this->fakeAddress instanceof ElementInterface);
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
            References\AddressType::REGISTRATION(),
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
            References\Language::RUS(),
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
            References\CityType::SETTLEMENT(),
            $this->fakeAddress->getCityType()
        );
    }
}
