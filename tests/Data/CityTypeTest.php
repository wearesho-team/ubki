<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use Wearesho\Bobra\Ubki\Data\CityType;
use PHPUnit\Framework\TestCase;

/**
 * Class CityTypeTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data
 */
class CityTypeTest extends TestCase
{
    public function testUrbanVillage(): void
    {
        $description = 'поселок городскоо типа';
        $cityType = CityType::URBAN_VILLAGE($description);
        $this->assertEquals(CityType::URBAN_VILLAGE, $cityType->getValue());
        $this->assertEquals('URBAN_VILLAGE', $cityType->getKey());
        $this->assertEquals($description, $cityType->getDescription());
    }

    public function testTown(): void
    {
        $description = 'город';
        $cityType = CityType::TOWN($description);
        $this->assertEquals(CityType::TOWN, $cityType->getValue());
        $this->assertEquals('TOWN', $cityType->getKey());
        $this->assertEquals($description, $cityType->getDescription());
    }

    public function testSettlement(): void
    {
        $description = 'поселок';
        $cityType = CityType::SETTLEMENT($description);
        $this->assertEquals(CityType::SETTLEMENT, $cityType->getValue());
        $this->assertEquals('SETTLEMENT', $cityType->getKey());
        $this->assertEquals($description, $cityType->getDescription());
    }

    public function testVillage(): void
    {
        $description = 'село';
        $cityType = CityType::VILLAGE($description);
        $this->assertEquals(CityType::VILLAGE, $cityType->getValue());
        $this->assertEquals('VILLAGE', $cityType->getKey());
        $this->assertEquals($description, $cityType->getDescription());
    }
}
