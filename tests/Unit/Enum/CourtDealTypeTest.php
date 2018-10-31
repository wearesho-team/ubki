<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\CourtDealType;

/**
 * Class CourtDealTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class CourtDealTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(CourtDealType::ADMINISTRATIVE(), new CourtDealType(CourtDealType::ADMINISTRATIVE));
        $this->assertEquals(CourtDealType::CIVIL(), new CourtDealType(CourtDealType::CIVIL));
        $this->assertEquals(CourtDealType::COMPLEX_CLAIMS(), new CourtDealType(CourtDealType::COMPLEX_CLAIMS));
        $this->assertEquals(CourtDealType::CRIMINAL(), new CourtDealType(CourtDealType::CRIMINAL));
        $this->assertEquals(CourtDealType::ECONOMIC(), new CourtDealType(CourtDealType::ECONOMIC));
        $this->assertEquals(CourtDealType::LABOR(), new CourtDealType(CourtDealType::LABOR));
        $this->assertEquals(CourtDealType::PROBLEM_LOANS(), new CourtDealType(CourtDealType::PROBLEM_LOANS));
    }
}
