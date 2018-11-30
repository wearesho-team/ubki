<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Dictionaries\CollateralType;

/**
 * Class CollateralTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass CollateralType
 * @internal
 */
class CollateralTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(CollateralType::LEGAL(), new CollateralType(CollateralType::LEGAL));
        $this->assertEquals(CollateralType::INDIVIDUAL(), new CollateralType(CollateralType::INDIVIDUAL));
        $this->assertEquals(
            CollateralType::OTHER_MOVABLE_STATE(),
            new CollateralType(CollateralType::OTHER_MOVABLE_STATE)
        );
        $this->assertEquals(
            CollateralType::WITHOUT_COLLATERAL(),
            new CollateralType(CollateralType::WITHOUT_COLLATERAL)
        );
        $this->assertEquals(CollateralType::GUARANTEE(), new CollateralType(CollateralType::GUARANTEE));
        $this->assertEquals(CollateralType::BANK_METALS(), new CollateralType(CollateralType::BANK_METALS));
        $this->assertEquals(
            CollateralType::BANKS_AND_COUNTRY_GUARANTEE_WITH_RATE_A(),
            new CollateralType(CollateralType::BANKS_AND_COUNTRY_GUARANTEE_WITH_RATE_A)
        );
        $this->assertEquals(
            CollateralType::BANKS_GUARANTEE_WITH_CREDIT_RATING_NOT_LOWER_BBB(),
            new CollateralType(CollateralType::BANKS_GUARANTEE_WITH_CREDIT_RATING_NOT_LOWER_BBB)
        );
        $this->assertEquals(
            CollateralType::BANKS_GUARANTEES_WITH_CREDIT_RATING_A(),
            new CollateralType(CollateralType::BANKS_GUARANTEES_WITH_CREDIT_RATING_A)
        );
        $this->assertEquals(CollateralType::BIOLOGICAL_ASSETS(), new CollateralType(CollateralType::BIOLOGICAL_ASSETS));
        $this->assertEquals(
            CollateralType::BONDS_OF_STATE_MORTGAGE_INSTITUTION(),
            new CollateralType(CollateralType::BONDS_OF_STATE_MORTGAGE_INSTITUTION)
        );
        $this->assertEquals(
            CollateralType::CABINET_MINISTERS_GUARANTEES(),
            new CollateralType(CollateralType::CABINET_MINISTERS_GUARANTEES)
        );
        $this->assertEquals(CollateralType::EQUIPMENT(), new CollateralType(CollateralType::EQUIPMENT));
        $this->assertEquals(CollateralType::FINISHED_PRODUCTS(), new CollateralType(CollateralType::FINISHED_PRODUCTS));
        $this->assertEquals(
            CollateralType::GOVERNMENT_COUNTRIES_GUARANTEES_WITH_RATING_A(),
            new CollateralType(CollateralType::GOVERNMENT_COUNTRIES_GUARANTEES_WITH_RATING_A)
        );
        $this->assertEquals(
            CollateralType::GOVERNMENT_COUNTRIES_GUARANTEES_WITH_RATING_BBB(),
            new CollateralType(CollateralType::GOVERNMENT_COUNTRIES_GUARANTEES_WITH_RATING_BBB)
        );
        $this->assertEquals(
            CollateralType::GOVERNMENT_SECURITIES(),
            new CollateralType(CollateralType::GOVERNMENT_SECURITIES)
        );
        $this->assertEquals(
            CollateralType::GOVERNMENT_SECURITIES_ON_REPO_TRANSACTIONS(),
            new CollateralType(CollateralType::GOVERNMENT_SECURITIES_ON_REPO_TRANSACTIONS)
        );
        $this->assertEquals(
            CollateralType::INTEGRAL_PROPERTY_COMPLEX_OBJECT(),
            new CollateralType(CollateralType::INTEGRAL_PROPERTY_COMPLEX_OBJECT)
        );
        $this->assertEquals(
            CollateralType::INTERNATIONAL_BANKS_GUARANTEES(),
            new CollateralType(CollateralType::INTERNATIONAL_BANKS_GUARANTEES)
        );
        $this->assertEquals(
            CollateralType::INTERNATIONAL_MULTILATERAL_BANKS_GUARANTEES(),
            new CollateralType(CollateralType::INTERNATIONAL_MULTILATERAL_BANKS_GUARANTEES)
        );
        $this->assertEquals(
            CollateralType::INVESTMENT_CERTIFICATES(),
            new CollateralType(CollateralType::INVESTMENT_CERTIFICATES)
        );
        $this->assertEquals(CollateralType::LIGHT_VEHICLES(), new CollateralType(CollateralType::LIGHT_VEHICLES));
        $this->assertEquals(CollateralType::MONEY_COVER(), new CollateralType(CollateralType::MONEY_COVER));
        $this->assertEquals(CollateralType::MORTGAGE_BONDS(), new CollateralType(CollateralType::MORTGAGE_BONDS));
        $this->assertEquals(
            CollateralType::MORTGAGE_BONDS_ISSUED_BY_FINANCIAL_INSTITUTION(),
            new CollateralType(CollateralType::MORTGAGE_BONDS_ISSUED_BY_FINANCIAL_INSTITUTION)
        );
        $this->assertEquals(CollateralType::MOTOR_TRANSPORT(), new CollateralType(CollateralType::MOTOR_TRANSPORT));
        $this->assertEquals(
            CollateralType::NATIONAL_BANK_GUARANTEES(),
            new CollateralType(CollateralType::NATIONAL_BANK_GUARANTEES)
        );
        $this->assertEquals(CollateralType::NOMINAL_SAVINGS(), new CollateralType(CollateralType::NOMINAL_SAVINGS));
        $this->assertEquals(
            CollateralType::NON_GOVERNMENT_SECURITIES(),
            new CollateralType(CollateralType::NON_GOVERNMENT_SECURITIES)
        );
        $this->assertEquals(
            CollateralType::OTHER_BANKS_GUARANTEE(),
            new CollateralType(CollateralType::OTHER_BANKS_GUARANTEE)
        );
        $this->assertEquals(CollateralType::OTHER_REAL_ESTATE(), new CollateralType(CollateralType::OTHER_REAL_ESTATE));
        $this->assertEquals(
            CollateralType::OTHER_TYPES_OF_COLLATERAL(),
            new CollateralType(CollateralType::OTHER_TYPES_OF_COLLATERAL)
        );
        $this->assertEquals(CollateralType::PLEDGE_OF_LAND(), new CollateralType(CollateralType::PLEDGE_OF_LAND));
        $this->assertEquals(CollateralType::PRECIOUS_METALS(), new CollateralType(CollateralType::PRECIOUS_METALS));
        $this->assertEquals(
            CollateralType::PROPERTY_RIGHTS_PROPERTY_THAT_WILL_BELONG_NON_HOUSING_FUND(),
            new CollateralType(CollateralType::PROPERTY_RIGHTS_PROPERTY_THAT_WILL_BELONG_NON_HOUSING_FUND)
        );
        $this->assertEquals(
            CollateralType::PROPERTY_RIGHTS_TO_FUTURE_REAL_ESTATE(),
            new CollateralType(CollateralType::PROPERTY_RIGHTS_TO_FUTURE_REAL_ESTATE)
        );
        $this->assertEquals(
            CollateralType::PROPERTY_RIGHTS_TO_OTHER_COLLATERAL_OBJECTS(),
            new CollateralType(CollateralType::PROPERTY_RIGHTS_TO_OTHER_COLLATERAL_OBJECTS)
        );
        $this->assertEquals(CollateralType::REAL_ESTATE(), new CollateralType(CollateralType::REAL_ESTATE));
        $this->assertEquals(
            CollateralType::REAL_ESTATE_EXCEPT_FOR_HOUSING(),
            new CollateralType(CollateralType::REAL_ESTATE_EXCEPT_FOR_HOUSING)
        );
        $this->assertEquals(
            CollateralType::RIGHT_PROPERTY_TO_CASH_DEPOSITS(),
            new CollateralType(CollateralType::RIGHT_PROPERTY_TO_CASH_DEPOSITS)
        );
        $this->assertEquals(
            CollateralType::RIGHT_PROPERTY_TO_CASH_PLACED_ON_DEPOSIT(),
            new CollateralType(CollateralType::RIGHT_PROPERTY_TO_CASH_PLACED_ON_DEPOSIT)
        );
        $this->assertEquals(
            CollateralType::SECURED_CASH_BANKS_GUARANTEES(),
            new CollateralType(CollateralType::SECURED_CASH_BANKS_GUARANTEES)
        );
        $this->assertEquals(
            CollateralType::SECURITIES_ISSUED_BY_LOCAL_AUTHORITIES(),
            new CollateralType(CollateralType::SECURITIES_ISSUED_BY_LOCAL_AUTHORITIES)
        );
        $this->assertEquals(
            CollateralType::SECURITIES_ISSUED_BY_NBU(),
            new CollateralType(CollateralType::SECURITIES_ISSUED_BY_NBU)
        );
        $this->assertEquals(
            CollateralType::SECURITIES_THAT_ENTERED_IN_EXCHANGE_REGISTER(),
            new CollateralType(CollateralType::SECURITIES_THAT_ENTERED_IN_EXCHANGE_REGISTER)
        );
        $this->assertEquals(
            CollateralType::SEVERAL_COLLATERAL(),
            new CollateralType(CollateralType::SEVERAL_COLLATERAL)
        );
        $this->assertEquals(
            CollateralType::SEVERAL_COLLATERAL_MORTGAGE(),
            new CollateralType(CollateralType::SEVERAL_COLLATERAL_MORTGAGE)
        );
        $this->assertEquals(
            CollateralType::SEVERAL_COLLATERAL_WITH_FUTURE_LARGEST_REAL_ESTATE(),
            new CollateralType(CollateralType::SEVERAL_COLLATERAL_WITH_FUTURE_LARGEST_REAL_ESTATE)
        );
        $this->assertEquals(
            CollateralType::SEVERAL_COLLATERAL_WITH_LARGEST_REAL_ESTATE(),
            new CollateralType(CollateralType::SEVERAL_COLLATERAL_WITH_LARGEST_REAL_ESTATE)
        );
        $this->assertEquals(CollateralType::SEVERAL_SECURITY(), new CollateralType(CollateralType::SEVERAL_SECURITY));
        $this->assertEquals(
            CollateralType::SEVERAL_SECURITY_REAL_ESTATE_OF_HOUSING(),
            new CollateralType(CollateralType::SEVERAL_SECURITY_REAL_ESTATE_OF_HOUSING)
        );
        $this->assertEquals(CollateralType::STOCK_IN_TRADE(), new CollateralType(CollateralType::STOCK_IN_TRADE));
        $this->assertEquals(
            CollateralType::TRANSPORT_VEHICLES_EXCEPT_LIGHT_CARS(),
            new CollateralType(CollateralType::TRANSPORT_VEHICLES_EXCEPT_LIGHT_CARS)
        );
    }
}
