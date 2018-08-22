<?php

namespace Wearesho\Bobra\Ubki\Tests\Collections;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Collections\Addresses;
use Wearesho\Bobra\Ubki\Entities\Address;

/**
 * Class AddressesTest
 * @package Wearesho\Bobra\Ubki\Tests\Collections
 * @coversDefaultClass Addresses
 * @internal
 */
class AddressesTest extends TestCase
{
    protected const TYPE = Address::class;

    /** @var Addresses */
    protected $fakeAddresses;

    protected function setUp(): void
    {
        $this->fakeAddresses = new Addresses();
    }

    public function testType(): void
    {
        $this->assertEquals(
            static::TYPE,
            $this->fakeAddresses->type()
        );
    }
}
