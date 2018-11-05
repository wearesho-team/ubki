<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\NegativeFactorType;

/**
 * Class NegativeFactorTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Enum\NegativeFactorType
 * @internal
 */
class NegativeFactorTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            NegativeFactorType::BANK_DEBTORS(),
            new NegativeFactorType(NegativeFactorType::BANK_DEBTORS)
        );
        $this->assertEquals(
            NegativeFactorType::BANKRUPTCY_PROCEDURE(),
            new NegativeFactorType(NegativeFactorType::BANKRUPTCY_PROCEDURE)
        );
        $this->assertEquals(NegativeFactorType::DEAD(), new NegativeFactorType(NegativeFactorType::DEAD));
        $this->assertEquals(
            NegativeFactorType::FOUNDERS_OF_LEGAL_ENTITIES_WITH_ARREARS(),
            new NegativeFactorType(NegativeFactorType::FOUNDERS_OF_LEGAL_ENTITIES_WITH_ARREARS)
        );
        $this->assertEquals(
            NegativeFactorType::LIQUIDATION_PROCEDURE(),
            new NegativeFactorType(NegativeFactorType::LIQUIDATION_PROCEDURE)
        );
        $this->assertEquals(
            NegativeFactorType::PERSONS_WITH_FRAUDULENT_SIGNS(),
            new NegativeFactorType(NegativeFactorType::PERSONS_WITH_FRAUDULENT_SIGNS)
        );
    }
}
