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
            Data\CityType::SETTLEMENT('описание'),
            '2',
            '24'
        );
    }

    public function testGetState(): void
    {
        $this->assertEquals('Харьковская', $this->element->state);
    }

    public function testGetStreet(): void
    {
        $this->assertEquals('Научная', $this->element->street);
    }

    public function testGetFullAddress(): void
    {
        $this->assertNull($this->element->fullAddress);
    }

    public function testGetCityType(): void
    {
        $this->assertEquals(Data\CityType::SETTLEMENT('описание'), $this->element->cityType);
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(Carbon::parse('2018-09-09'), Carbon::instance($this->element->createdAt));
        $this->assertEquals('2018-09-09', Carbon::instance($this->element->createdAt)->toDateString());
    }

    public function testGetHouse(): void
    {
        $this->assertEquals('25', $this->element->house);
    }

    public function testGetCity(): void
    {
        $this->assertEquals('Харьков', $this->element->city);
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(Data\Language::RUS(), $this->element->language);
    }

    public function testGetCountry(): void
    {
        $this->assertEquals('Украина', $this->element->country);
    }

    public function testGetCorpus(): void
    {
        $this->assertEquals('2', $this->element->corpus);
    }

    public function testGetArea(): void
    {
        $this->assertEquals('Шевченковский', $this->element->area);
    }

    public function testGetFlat(): void
    {
        $this->assertEquals('24', $this->element->flat);
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

    public function testGetIndex(): void
    {
        $this->assertEquals(25054, $this->element->index);
        $this->assertEquals('25054', $this->element->index);
    }

    public function testGetType(): void
    {
        $this->assertEquals(Data\Credential\Address\Type::REGISTRATION(), $this->element->type);
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
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
