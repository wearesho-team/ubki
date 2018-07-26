<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Address;

use Wearesho\Bobra\Ubki;

use PHPUnit\Framework\TestCase;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Collection
 */
class CollectionTest extends TestCase
{
    public function testType(): void
    {
        $this->assertEquals(Ubki\Data\Address\Entity::class, (new Ubki\Data\Address\Collection())->type());
    }
}
