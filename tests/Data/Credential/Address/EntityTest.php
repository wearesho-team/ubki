<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Address;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Address
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    public const TAG = 'addr';

    /** @var Data\Credential\Address\Entity element */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Data\Credential\Address\Entity(
            Carbon::parse('2018-09-09'),
            Data\Language::RUS(),
            Data\Credential\Address\Type::REGISTRATION(),
            'Украина',
            'Харьков',
            'Научная',
            '25',
            25054,
            'Харьковская',
            'Шевченковский',
            Data\CityType::SETTLEMENT(),
            '2',
            '24'
        );
    }

    public function testGetState(): void
    {
        $this->assertEquals('Харьковская', $this->element->getState());
    }

    public function testGetStreet(): void
    {
        $this->assertEquals('Научная', $this->element->getStreet());
    }

    public function testGetFullAddress(): void
    {
        $this->assertNull($this->element->getFullAddress());
    }

    public function testGetCityType(): void
    {
        $this->assertEquals(Data\CityType::SETTLEMENT(), $this->element->getCityType());
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(Carbon::parse('2018-09-09'), $this->element->getCreatedAt());
    }

    public function testGetHouse(): void
    {
        $this->assertEquals('25', $this->element->getHouse());
    }

    public function testGetCity(): void
    {
        $this->assertEquals('Харьков', $this->element->getCity());
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(Data\Language::RUS(), $this->element->getLanguage());
    }

    public function testGetCountry(): void
    {
        $this->assertEquals('Украина', $this->element->getCountry());
    }

    public function testGetCorpus(): void
    {
        $this->assertEquals('2', $this->element->getCorpus());
    }

    public function testGetArea(): void
    {
        $this->assertEquals('Шевченковский', $this->element->getArea());
    }

    public function testGetFlat(): void
    {
        $this->assertEquals('24', $this->element->getFlat());
    }

    public function testInstance(): void
    {
        $this->assertNotEmpty($this->element);
        $this->assertEquals(
            new Data\Credential\Address\Entity(
                Carbon::parse('2018-09-09'),
                Data\Language::RUS(),
                Data\Credential\Address\Type::REGISTRATION(),
                'Украина',
                'Харьков',
                'Научная',
                '25',
                25054,
                'Харьковская',
                'Шевченковский',
                Data\CityType::SETTLEMENT(),
                '2',
                '24'
            ),
            $this->element
        );
    }

    public function testGetIndex(): void
    {
        $this->assertEquals(25054, $this->element->getIndex());
    }

    public function testGetType(): void
    {
        $this->assertEquals(Data\Credential\Address\Type::REGISTRATION(), $this->element->getType());
    }
}
