<?php

namespace Wearesho\Bobra\Ubki\Tests\Collection;

use Wearesho\Bobra\Ubki;

use PHPUnit\Framework\TestCase;

/**
 * Class ContactTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Collection
 */
class ContactTest extends TestCase
{
    public function testType()
    {
        $this->assertEquals(Ubki\Block\Contact::class, (new Ubki\Collection\Contact())->type());
    }
}
