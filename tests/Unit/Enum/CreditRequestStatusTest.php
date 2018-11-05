<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use Wearesho\Bobra\Ubki\Enum\CreditRequestStatus;

use PHPUnit\Framework\TestCase;

/**
 * Class CreditRequestStatusTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass CreditRequestStatus
 * @internal
 */
class CreditRequestStatusTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            CreditRequestStatus::VERIFICATION(),
            new CreditRequestStatus(CreditRequestStatus::VERIFICATION)
        );
        $this->assertEquals(CreditRequestStatus::AGREED(), new CreditRequestStatus(CreditRequestStatus::AGREED));
        $this->assertEquals(CreditRequestStatus::FPD30(), new CreditRequestStatus(CreditRequestStatus::FPD30));
        $this->assertEquals(
            CreditRequestStatus::FPSPD_TPD_DEFOLT(),
            new CreditRequestStatus(CreditRequestStatus::FPSPD_TPD_DEFOLT)
        );
        $this->assertEquals(CreditRequestStatus::PZ30(), new CreditRequestStatus(CreditRequestStatus::PZ30));
        $this->assertEquals(CreditRequestStatus::PZ90(), new CreditRequestStatus(CreditRequestStatus::PZ90));
        $this->assertEquals(CreditRequestStatus::REFUSAL(), new CreditRequestStatus(CreditRequestStatus::REFUSAL));
    }
}
