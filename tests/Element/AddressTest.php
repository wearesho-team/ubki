<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class AddressTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class AddressTest extends Ubki\Tests\Extend\ElementTestCase
{
    public const TAG = 'addr';

    /** @var Ubki\Element\Address element */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Ubki\Element\Address(
            Carbon::parse('2018-09-09'),
            1,
            2,
            'Украина',
            'Харьков',
            'Научная',
            '25',
            25054,
            'Харьковская',
            'Шевченковский',
            2,
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
        $this->assertEquals(2, $this->element->getCityType());
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
        $this->assertEquals(1, $this->element->getLanguage());
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
            new Ubki\Element\Address(
                Carbon::parse('2018-09-09'),
                1,
                2,
                'Украина',
                'Харьков',
                'Научная',
                '25',
                25054,
                'Харьковская',
                'Шевченковский',
                2,
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
        $this->assertEquals(2, $this->element->getType());
    }

    public function tag(): string
    {
        return 'addr';
    }
}