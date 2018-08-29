<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\CreditDealType;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class CreditDealTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass CreditDealType
 * @internal
 */
class CreditDealTypeTest extends ReferenceTestCase
{
    public function testAppointment(): void
    {
        $this->fakeReference = CreditDealType::APPOINTMENT(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::APPOINTMENT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testBankAccount(): void
    {
        $this->fakeReference = CreditDealType::BANK_ACCOUNT(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::BANK_ACCOUNT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testBankGuarantee(): void
    {
        $this->fakeReference = CreditDealType::BANK_GUARANTEE(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::BANK_GUARANTEE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRetailSale(): void
    {
        $this->fakeReference = CreditDealType::RETAIL_SALE(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::RETAIL_SALE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuaranteeInternalAdvising(): void
    {
        $this->fakeReference = CreditDealType::GUARANTEE_INTERNATIONAL_ADVISING(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::GUARANTEE_INTERNATIONAL_ADVISING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCommodityLoan(): void
    {
        $this->fakeReference = CreditDealType::COMMODITY_LOAN(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::COMMODITY_LOAN(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testFactoring(): void
    {
        $this->fakeReference = CreditDealType::FACTORING(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::FACTORING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testBarter(): void
    {
        $this->fakeReference = CreditDealType::BARTER(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::BARTER(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuaranteeInternationalOpening(): void
    {
        $this->fakeReference = CreditDealType::GUARANTEE_INTERNATIONAL_OPENING(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::GUARANTEE_INTERNATIONAL_OPENING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuaranteeInternalOpening(): void
    {
        $this->fakeReference = CreditDealType::GUARANTEE_INTERNAL_OPENING(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::GUARANTEE_INTERNAL_OPENING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testMortgage(): void
    {
        $this->fakeReference = CreditDealType::MORTGAGE(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::MORTGAGE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testReplenishmentWorkingCapital(): void
    {
        $this->fakeReference = CreditDealType::REPLENISHMENT_WORKING_CAPITAL(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::REPLENISHMENT_WORKING_CAPITAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testStandbyLetterCreditInternationalOpening(): void
    {
        $this->fakeReference = CreditDealType::STANDBY_LETTER_CREDIT_INTERNATIONAL_OPENING(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::STANDBY_LETTER_CREDIT_INTERNATIONAL_OPENING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testSale(): void
    {
        $this->fakeReference = CreditDealType::SALE(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::SALE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCarPurchase(): void
    {
        $this->fakeReference = CreditDealType::CAR_PURCHASE(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::CAR_PURCHASE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testLoan(): void
    {
        $this->fakeReference = CreditDealType::LOAN(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::LOAN(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testLeasing(): void
    {
        $this->fakeReference = CreditDealType::LEASING(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::LEASING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testIndependent(): void
    {
        $this->fakeReference = CreditDealType::INDEPENDENT(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::INDEPENDENT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCreditCard(): void
    {
        $this->fakeReference = CreditDealType::CREDIT_CARD(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::CREDIT_CARD(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCounterGuaranteeInternal(): void
    {
        $this->fakeReference = CreditDealType::COUNTER_GUARANTEE_INTERNAL(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::COUNTER_GUARANTEE_INTERNAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testTraining(): void
    {
        $this->fakeReference = CreditDealType::TRAINING(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::TRAINING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRentingDwelling(): void
    {
        $this->fakeReference = CreditDealType::RENTING_DWELLING(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::RENTING_DWELLING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testInsurance(): void
    {
        $this->fakeReference = CreditDealType::INSURANCE(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::INSURANCE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPlacementLoansDepositsBanks(): void
    {
        $this->fakeReference = CreditDealType::PLACEMENT_LOANS_DEPOSITS_BANKS(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::PLACEMENT_LOANS_DEPOSITS_BANKS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCarriage(): void
    {
        $this->fakeReference = CreditDealType::CARRIAGE(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::CARRIAGE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testSupplyGoods(): void
    {
        $this->fakeReference = CreditDealType::SUPPLY_GOODS(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::SUPPLY_GOODS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testLending(): void
    {
        $this->fakeReference = CreditDealType::LENDING(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::LENDING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRenderingService(): void
    {
        $this->fakeReference = CreditDealType::RENDERING_SERVICE(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::RENDERING_SERVICE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuaranteeInternationalAdvising(): void
    {
        $this->fakeReference = CreditDealType::GUARANTEE_INTERNATIONAL_ADVISING(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::GUARANTEE_INTERNATIONAL_ADVISING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testLeaseRental(): void
    {
        $this->fakeReference = CreditDealType::LEASE_RENTAL(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::LEASE_RENTAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testOtherConsumerPurposes(): void
    {
        $this->fakeReference = CreditDealType::OTHER_CONSUMER_PURPOSES(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::OTHER_CONSUMER_PURPOSES(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testImportedLetterCreditInternational(): void
    {
        $this->fakeReference = CreditDealType::IMPORTED_LETTER_CREDIT_INTERNATIONAL(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::IMPORTED_LETTER_CREDIT_INTERNATIONAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testConsumerCredit(): void
    {
        $this->fakeReference = CreditDealType::CONSUMER_CREDIT(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::CONSUMER_CREDIT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuaranteeAval(): void
    {
        $this->fakeReference = CreditDealType::GUARANTEE_AVAL(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::GUARANTEE_AVAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testDomesticLetterCredit(): void
    {
        $this->fakeReference = CreditDealType::DOMESTIC_LETTER_CREDIT(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::DOMESTIC_LETTER_CREDIT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCommission(): void
    {
        $this->fakeReference = CreditDealType::COMMISSION(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::COMMISSION(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testSaleOfRealEstate(): void
    {
        $this->fakeReference = CreditDealType::SALE_OF_REAL_ESTATE(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::SALE_OF_REAL_ESTATE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGift(): void
    {
        $this->fakeReference = CreditDealType::GIFT(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::GIFT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testBusinessDevelopment(): void
    {
        $this->fakeReference = CreditDealType::BUSINESS_DEVELOPMENT(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::BUSINESS_DEVELOPMENT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testUncertain(): void
    {
        $this->fakeReference = CreditDealType::UNCERTAIN(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::UNCERTAIN(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testAcquisitionFixedAssets(): void
    {
        $this->fakeReference = CreditDealType::ACQUISITION_FIXED_ASSETS(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::ACQUISITION_FIXED_ASSETS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testStorage(): void
    {
        $this->fakeReference = CreditDealType::STORAGE(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::STORAGE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCommercialCredit(): void
    {
        $this->fakeReference = CreditDealType::COMMERCIAL_CREDIT(static::DESCRIPTION);
        $this->assertEquals(
            CreditDealType::COMMERCIAL_CREDIT(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
