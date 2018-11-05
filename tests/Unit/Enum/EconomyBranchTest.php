<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\EconomyBranch;

/**
 * Class EconomyBranchTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass EconomyBranch
 * @internal
 */
class EconomyBranchTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(EconomyBranch::EDUCATION(), new EconomyBranch(EconomyBranch::EDUCATION));
        $this->assertEquals(EconomyBranch::BUILDING(), new EconomyBranch(EconomyBranch::EDUCATION));
        $this->assertEquals(EconomyBranch::AGRICULTURE(), new EconomyBranch(EconomyBranch::EDUCATION));
        $this->assertEquals(
            EconomyBranch::ACTIVITIES_OF_EXTRATERRITORIAL_ORGANIZATIONS_AND_BODIES(),
            new EconomyBranch(EconomyBranch::ACTIVITIES_OF_EXTRATERRITORIAL_ORGANIZATIONS_AND_BODIES)
        );
        $this->assertEquals(
            EconomyBranch::ADMINISTRATIVE_OR_SUPPORT_SERVICES_1(),
            new EconomyBranch(EconomyBranch::ADMINISTRATIVE_OR_SUPPORT_SERVICES_1)
        );
        $this->assertEquals(
            EconomyBranch::ADMINISTRATIVE_OR_SUPPORT_SERVICES_2(),
            new EconomyBranch(EconomyBranch::ADMINISTRATIVE_OR_SUPPORT_SERVICES_2)
        );
        $this->assertEquals(
            EconomyBranch::ARTS_OR_SPORTS_OR_ENTERTAINMENT_OR_RECREATION(),
            new EconomyBranch(EconomyBranch::ARTS_OR_SPORTS_OR_ENTERTAINMENT_OR_RECREATION)
        );
        $this->assertEquals(
            EconomyBranch::FINANCIAL_OR_INSURANCE_ACTIVITIES(),
            new EconomyBranch(EconomyBranch::FINANCIAL_OR_INSURANCE_ACTIVITIES)
        );
        $this->assertEquals(
            EconomyBranch::HEALTH_OR_SOCIAL_CARE(),
            new EconomyBranch(EconomyBranch::HEALTH_OR_SOCIAL_CARE)
        );
        $this->assertEquals(
            EconomyBranch::HOUSEHOLD_ACTIVITIES(),
            new EconomyBranch(EconomyBranch::HOUSEHOLD_ACTIVITIES)
        );
        $this->assertEquals(
            EconomyBranch::INFORMATION_OR_TELECOMMUNICATIONS(),
            new EconomyBranch(EconomyBranch::INFORMATION_OR_TELECOMMUNICATIONS)
        );
        $this->assertEquals(EconomyBranch::MINING_INDUSTRY(), new EconomyBranch(EconomyBranch::MINING_INDUSTRY));
        $this->assertEquals(
            EconomyBranch::PROCESSING_INDUSTRY(),
            new EconomyBranch(EconomyBranch::PROCESSING_INDUSTRY)
        );
        $this->assertEquals(
            EconomyBranch::PROFESSIONAL_OR_SCIENTIFIC_OR_TECHNICAL_ACTIVITIES(),
            new EconomyBranch(EconomyBranch::PROFESSIONAL_OR_SCIENTIFIC_OR_TECHNICAL_ACTIVITIES)
        );
        $this->assertEquals(
            EconomyBranch::PROVIDING_OTHER_TYPES_OF_SERVICES(),
            new EconomyBranch(EconomyBranch::PROVIDING_OTHER_TYPES_OF_SERVICES)
        );
        $this->assertEquals(
            EconomyBranch::REAL_ESTATE_OPERATIONS(),
            new EconomyBranch(EconomyBranch::REAL_ESTATE_OPERATIONS)
        );
        $this->assertEquals(
            EconomyBranch::SUPPLY_ELECTRICITY_GAS_AIR(),
            new EconomyBranch(EconomyBranch::SUPPLY_ELECTRICITY_GAS_AIR)
        );
        $this->assertEquals(
            EconomyBranch::TEMPORARY_ACCOMMODATION_OR_CATERING(),
            new EconomyBranch(EconomyBranch::TEMPORARY_ACCOMMODATION_OR_CATERING)
        );
        $this->assertEquals(
            EconomyBranch::TRANSPORT_OR_STORAGE_FACILITIES_OR_COURIER_ACTIVITIES(),
            new EconomyBranch(EconomyBranch::TRANSPORT_OR_STORAGE_FACILITIES_OR_COURIER_ACTIVITIES)
        );
        $this->assertEquals(
            EconomyBranch::WATER_SUPPLY_SEWAGE(),
            new EconomyBranch(EconomyBranch::WATER_SUPPLY_SEWAGE)
        );
        $this->assertEquals(
            EconomyBranch::WHOLESALE_AND_RETAIL_TRADE_IN(),
            new EconomyBranch(EconomyBranch::WHOLESALE_AND_RETAIL_TRADE_IN)
        );
    }
}
