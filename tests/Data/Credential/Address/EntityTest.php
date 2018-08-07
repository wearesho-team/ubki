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

    public function testGetters(): void
    {
        $this->assertEquals('Харьковская', $this->element->state);
        $this->assertEquals('Научная', $this->element->street);
        $this->assertNull($this->element->fullAddress);
        $this->assertEquals(Data\CityType::SETTLEMENT('описание'), $this->element->cityType);
        $this->assertEquals(Carbon::parse('2018-09-09'), Carbon::instance($this->element->createdAt));
        $this->assertEquals('2018-09-09', Carbon::instance($this->element->createdAt)->toDateString());
        $this->assertEquals('Харьков', $this->element->city);
        $this->assertEquals('25', $this->element->house);
        $this->assertEquals(Data\Language::RUS(), $this->element->language);
        $this->assertEquals('Украина', $this->element->country);
        $this->assertEquals('2', $this->element->corpus);
        $this->assertEquals('Шевченковский', $this->element->area);
        $this->assertEquals('24', $this->element->flat);
        $this->assertEquals(25054, $this->element->index);
        $this->assertEquals('25054', $this->element->index);
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
