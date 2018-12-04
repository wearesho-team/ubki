<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class AddressTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Address
 * @internal
 */
class AddressTest extends Ubki\Tests\TestCase
{
    /** @var Ubki\Data\Elements\Address */
    protected $fakeAddress;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fakeAddress = $this->elementFaker->unique()->address;
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            $this->elementFaker->unique()->address->jsonSerialize(),
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
            $this->elementFaker->unique()->address->getFlat(),
            $this->fakeAddress->getFlat()
        );
    }

    public function testGetCity(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getCity(),
            $this->fakeAddress->getCity()
        );
    }

    public function testGetState(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getState(),
            $this->fakeAddress->getState()
        );
    }

    public function testGetArea(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getArea(),
            $this->fakeAddress->getArea()
        );
    }

    public function testGetIndex(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getIndex(),
            $this->fakeAddress->getIndex()
        );
    }

    public function testGetCorpus(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getCorpus(),
            $this->fakeAddress->getCorpus()
        );
    }

    public function testGetAddressType(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getAddressType(),
            $this->fakeAddress->getAddressType()
        );
    }

    public function testGetHouse(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getHouse(),
            $this->fakeAddress->getHouse()
        );
    }

    public function testGetStreet(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getStreet(),
            $this->fakeAddress->getStreet()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getCreatedAt(),
            $this->fakeAddress->getCreatedAt()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getLanguage(),
            $this->fakeAddress->getLanguage()
        );
    }

    public function testGetCountry(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getCountry(),
            $this->fakeAddress->getCountry()
        );
    }

    public function testGetFullAddress(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getFullAddress(),
            $this->fakeAddress->getFullAddress()
        );
    }

    public function testGetCityType(): void
    {
        $this->assertEquals(
            $this->elementFaker->unique()->address->getCityType(),
            $this->fakeAddress->getCityType()
        );
    }
}
