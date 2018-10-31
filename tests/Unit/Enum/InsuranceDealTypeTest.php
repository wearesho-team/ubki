<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\InsuranceDealType;

/**
 * Class InsuranceDealTypTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class InsuranceDealTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(InsuranceDealType::ACCIDENT(), new InsuranceDealType(InsuranceDealType::ACCIDENT));
        $this->assertEquals(InsuranceDealType::CASCO(), new InsuranceDealType(InsuranceDealType::CASCO));
        $this->assertEquals(InsuranceDealType::OSAGO(), new InsuranceDealType(InsuranceDealType::OSAGO));
    }
}
