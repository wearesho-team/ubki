<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Address;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Address
 *
 * @internal
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
            Data\CityType::SETTLEMENT('описание'),
            '2',
            '24'
        );
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
                Data\CityType::SETTLEMENT('описание'),
                '2',
                '24'
            ),
            $this->element
        );
    }

    public function testGetState(): void
    {
        $expected = 'Харьковская';
        $this->assertEquals($expected, $this->element->state);
        $this->assertEquals($expected, $this->element->getState());
    }

    public function testGetStreet(): void
    {
        $expected = 'Научная';
        $this->assertEquals($expected, $this->element->street);
        $this->assertEquals($expected, $this->element->getStreet());
    }

    public function testGetFullAddress(): void
    {
        $this->assertNull($this->element->fullAddress);
        $this->assertNull($this->element->getFullAddress());
    }

    public function testGetCityType(): void
    {
        $expected = Data\CityType::SETTLEMENT('описание');
        $this->assertEquals($expected, $this->element->cityType);
        $this->assertEquals($expected, $this->element->getCityType());
    }

    public function testGetCreatedAt(): void
    {
        $expected = Carbon::parse('2018-09-09');
        $this->assertEquals($expected, Carbon::instance($this->element->createdAt));
        $this->assertEquals($expected, Carbon::instance($this->element->getCreatedAt()));
    }

    public function testGetCity(): void
    {
        $expected = 'Харьков';
        $this->assertEquals($expected, $this->element->city);
        $this->assertEquals($expected, $this->element->getCity());
    }

    public function testGetHouse(): void
    {
        $expected = '25';
        $this->assertEquals($expected, $this->element->house);
        $this->assertEquals($expected, $this->element->getHouse());
    }

    public function testGetLanguage(): void
    {
        $expected = Data\Language::RUS();
        $this->assertEquals($expected, $this->element->language);
        $this->assertEquals($expected, $this->element->getLanguage());
    }

    public function testGetCountry(): void
    {
        $expected = 'Украина';
        $this->assertEquals($expected, $this->element->country);
        $this->assertEquals($expected, $this->element->getCountry());
    }

    public function testGetCorpus(): void
    {
        $expected = '2';
        $this->assertEquals($expected, $this->element->corpus);
        $this->assertEquals($expected, $this->element->getCorpus());
    }

    public function testGetArea(): void
    {
        $expected = 'Шевченковский';
        $this->assertEquals($expected, $this->element->area);
        $this->assertEquals($expected, $this->element->getArea());
    }

    public function testGetFlat(): void
    {
        $expected = '24';
        $this->assertEquals($expected, $this->element->flat);
        $this->assertEquals($expected, $this->element->getFlat());
    }

    public function testGetIndex(): void
    {
        $expected = 25054;
        $this->assertEquals($expected, $this->element->index);
        $this->assertEquals($expected, $this->element->getIndex());
        $expected = '25054';
        $this->assertEquals($expected, $this->element->index);
        $this->assertEquals($expected, $this->element->getIndex());
    }

    public function testGetType(): void
    {
        $expected = Data\Credential\Address\Type::REGISTRATION();
        $this->assertEquals($expected, $this->element->type);
        $this->assertEquals($expected, $this->element->getType());
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'createdAt' => '2018-09-09',
                'language' => 'RUS',
                'type' => 'REGISTRATION',
                'country' => 'Украина',
                'city' => 'Харьков',
                'street' => 'Научная',
                'house' => '25',
                'index' => '25054',
                'state' => 'Харьковская',
                'area' => 'Шевченковский',
                'cityType' => 'описание',
                'corpus' => '2',
                'flat' => '24',
                'fullAddress' => null
            ],
            $this->element->jsonSerialize()
        );
    }
}
