<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\CityType;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class CityTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass CityType
 * @internal
 */
class CityTypeTest extends ReferenceTestCase
{
    public function testSettlement(): void
    {
        $this->fakeReference = CityType::SETTLEMENT(static::DESCRIPTION);
        $this->assertEquals(CityType::SETTLEMENT(static::DESCRIPTION), $this->fakeReference);
    }

    public function testVillage(): void
    {
        $this->fakeReference = CityType::VILLAGE(static::DESCRIPTION);
        $this->assertEquals(CityType::VILLAGE(static::DESCRIPTION), $this->fakeReference);
    }

    public function testTown(): void
    {
        $this->fakeReference = CityType::TOWN(static::DESCRIPTION);
        $this->assertEquals(CityType::TOWN(static::DESCRIPTION), $this->fakeReference);
    }

    public function testUrbanVillage(): void
    {
        $this->fakeReference = CityType::URBAN_VILLAGE(static::DESCRIPTION);
        $this->assertEquals(CityType::URBAN_VILLAGE(static::DESCRIPTION), $this->fakeReference);
    }
}
