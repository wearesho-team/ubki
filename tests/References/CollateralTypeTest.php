<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\CollateralType;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class CollateralTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass CollateralType
 * @internal
 */
class CollateralTypeTest extends ReferenceTestCase
{
    public function testGuaranteeBanksAndCountriesWithRating(): void
    {
        $this->fakeReference = CollateralType::GUARANTEE_BANKS_AND_COUNTRIES_WITH_RATING(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::GUARANTEE_BANKS_AND_COUNTRIES_WITH_RATING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGovernmentSecurities(): void
    {
        $this->fakeReference = CollateralType::GOVERNMENT_SECURITIES(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::GOVERNMENT_SECURITIES(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuaranteeNatural(): void
    {
        $this->fakeReference = CollateralType::GUARANTEE_NATURAL(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::GUARANTEE_NATURAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testBankMetals(): void
    {
        $this->fakeReference = CollateralType::BANK_METALS(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::BANK_METALS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRightsCashDeposits(): void
    {
        $this->fakeReference = CollateralType::RIGHTS_CASH_DEPOSITS(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::RIGHTS_CASH_DEPOSITS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuaranteeInternationalBanks(): void
    {
        $this->fakeReference = CollateralType::GUARANTEE_INTERNATIONAL_BANKS(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::GUARANTEE_INTERNATIONAL_BANKS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuaranteeOtherBanks(): void
    {
        $this->fakeReference = CollateralType::GUARANTEE_OTHER_BANKS(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::GUARANTEE_OTHER_BANKS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuaranteeMinisters(): void
    {
        $this->fakeReference = CollateralType::GUARANTEE_MINISTERS(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::GUARANTEE_MINISTERS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuaranteeNationalBank(): void
    {
        $this->fakeReference = CollateralType::GUARANTEE_NATIONAL_BANK(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::GUARANTEE_NATIONAL_BANK(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testBondsMortgageInstitutionWithGuaranteeCmu(): void
    {
        $this->fakeReference = CollateralType::BONDS_MORTGAGE_INSTITUTION_WITH_GUARANTEE_CMU(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::BONDS_MORTGAGE_INSTITUTION_WITH_GUARANTEE_CMU(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuaranteeLegal(): void
    {
        $this->fakeReference = CollateralType::GUARANTEE_LEGAL(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::GUARANTEE_LEGAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testSecuritiesIssuedByNbu(): void
    {
        $this->fakeReference = CollateralType::SECURITIES_ISSUED_BY_NBU(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::SECURITIES_ISSUED_BY_NBU(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPreciousMetals(): void
    {
        $this->fakeReference = CollateralType::PRECIOUS_METALS(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::PRECIOUS_METALS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testNonGovernmentSecurities(): void
    {
        $this->fakeReference = CollateralType::NON_GOVERNMENT_SECURITIES(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::NON_GOVERNMENT_SECURITIES(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRightsWithInvestmentClassRating(): void
    {
        $this->fakeReference = CollateralType::RIGHTS_WITH_INVESTMENT_CLASS_RATING(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::RIGHTS_WITH_INVESTMENT_CLASS_RATING(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRealEstate(): void
    {
        $this->fakeReference = CollateralType::REAL_ESTATE(static::DESCRIPTION);
        $this->assertEquals(
            CollateralType::REAL_ESTATE(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
