<?php

namespace Wearesho\Bobra\Ubki\Tests\Collection;

use Wearesho\Bobra\Ubki\Collection\Address;
use PHPUnit\Framework\TestCase;

/**
 * Class AddressTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Collection
 */
class AddressTest extends TestCase
{
    public function testType(): void
    {
        $this->assertEquals(\Wearesho\Bobra\Ubki\Element\Address::class, (new Address())->type());
    }
}
