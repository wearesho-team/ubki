<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\IdPartner;

/**
 * Class IdPartnerTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass IdPartner
 * @internal
 */
class IdPartnerTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(IdPartner::FOREIGN(), new IdPartner(IdPartner::FOREIGN));
        $this->assertEquals(IdPartner::OWN(), new IdPartner(IdPartner::OWN));
    }
}
