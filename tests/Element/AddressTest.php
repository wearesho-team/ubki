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
    /** @var Ubki\Element\Address block */
    protected $block;

    protected function setUp(): void
    {
        $this->block = new Ubki\Element\Address(
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
        $this->assertEquals('Харьковская', $this->block->getState());
    }

    public function testGetStreet(): void
    {
        $this->assertEquals('Научная', $this->block->getStreet());
    }

    public function testGetFullAddress(): void
    {
        $this->assertNull($this->block->getFullAddress());
    }

    public function testGetCityType(): void
    {
        $this->assertEquals(2, $this->block->getCityType());
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(Carbon::parse('2018-09-09'), $this->block->getCreatedAt());
    }

    public function testGetHouse(): void
    {
        $this->assertEquals('25', $this->block->getHouse());
    }

    public function testGetCity(): void
    {
        $this->assertEquals('Харьков', $this->block->getCity());
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(1, $this->block->getLanguage());
    }

    public function testGetCountry(): void
    {
        $this->assertEquals('Украина', $this->block->getCountry());
    }

    public function testGetCorpus(): void
    {
        $this->assertEquals('2', $this->block->getCorpus());
    }

    public function testGetArea(): void
    {
        $this->assertEquals('Шевченковский', $this->block->getArea());
    }

    public function testGetFlat(): void
    {
        $this->assertEquals('24', $this->block->getFlat());
    }

    public function test__construct(): void
    {
        $this->assertNotEmpty($this->block);
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
            $this->block
        );
    }

    public function testGetIndex(): void
    {
        $this->assertEquals(25054, $this->block->getIndex());
    }

    public function testGetType(): void
    {
        $this->assertEquals(2, $this->block->getType());
    }

    public function tag(): string
    {
        return 'addr';
    }
}
