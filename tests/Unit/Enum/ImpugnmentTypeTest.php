<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\ImpugnmentType;

/**
 * Class ImpugnmentTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass ImpugnmentType
 * @internal
 */
class ImpugnmentTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(ImpugnmentType::CKI(), new ImpugnmentType(ImpugnmentType::CKI));
        $this->assertEquals(ImpugnmentType::SUD(), new ImpugnmentType(ImpugnmentType::SUD));
    }
}
