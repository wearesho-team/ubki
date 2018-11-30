<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class CollateralType
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @see https://sites.google.com/ubki.ua/doc/%D1%81%D0%BF%D1%80%D0%B0%D0%B2%D0%BE%D1%87%D0%BD%D0%B8%D0%BA%D0%B8/15-%D1%81%D0%BF%D1%80%D0%B0%D0%B2%D0%BE%D1%87%D0%BD%D0%B8%D0%BA-%D0%B2%D0%B8%D0%B4-%D0%BE%D0%B1%D0%B5%D1%81%D0%BF%D0%B5%D1%87%D0%B5%D0%BD%D0%B8%D1%8F?authuser=0
 *
 * @method static CollateralType LEGAL(string $description = null)
 * @method static CollateralType INDIVIDUAL(string $description = null)
 * @method static CollateralType CABINET_MINISTERS_GUARANTEES(string $description = null)
 * @method static CollateralType NATIONAL_BANK_GUARANTEES(string $description = null)
 * @method static CollateralType INTERNATIONAL_BANKS_GUARANTEES(string $description = null)
 * @method static CollateralType OTHER_BANKS_GUARANTEE(string $description = null)
 * @method static CollateralType RIGHT_PROPERTY_TO_CASH_DEPOSITS(string $description = null)
 * @method static CollateralType BANKS_AND_COUNTRY_GUARANTEE_WITH_RATE_A(string $description = null)
 * @method static CollateralType RIGHT_PROPERTY_TO_CASH_PLACED_ON_DEPOSIT(string $description = null)
 * @method static CollateralType SECURITIES_ISSUED_BY_NBU(string $description = null)
 * @method static CollateralType BONDS_OF_STATE_MORTGAGE_INSTITUTION(string $description = null)
 * @method static CollateralType BANK_METALS(string $description = null)
 * @method static CollateralType PRECIOUS_METALS(string $description = null)
 * @method static CollateralType GOVERNMENT_SECURITIES(string $description = null)
 * @method static CollateralType NON_GOVERNMENT_SECURITIES(string $description = null)
 * @method static CollateralType REAL_ESTATE(string $description = null)
 * @method static CollateralType PROPERTY_RIGHTS_TO_FUTURE_REAL_ESTATE(string $description = null)
 * @method static CollateralType FINISHED_PRODUCTS(string $description = null)
 * @method static CollateralType STOCK_IN_TRADE(string $description = null)
 * @method static CollateralType MOTOR_TRANSPORT(string $description = null)
 * @method static CollateralType OTHER_MOVABLE_STATE(string $description = null)
 * @method static CollateralType OTHER_REAL_ESTATE(string $description = null)
 * @method static CollateralType PROPERTY_RIGHTS_TO_OTHER_COLLATERAL_OBJECTS(string $description = null)
 * @method static CollateralType OTHER_TYPES_OF_COLLATERAL(string $description = null)
 * @method static CollateralType GUARANTEE(string $description = null)
 * @method static CollateralType LIGHT_VEHICLES(string $description = null)
 * @method static CollateralType MONEY_COVER(string $description = null)
 * @method static CollateralType REAL_ESTATE_EXCEPT_FOR_HOUSING(string $description = null)
 * @method static CollateralType TRANSPORT_VEHICLES_EXCEPT_LIGHT_CARS(string $description = null)
 * @method static CollateralType MORTGAGE_BONDS(string $description = null)
 * @method static CollateralType SEVERAL_COLLATERAL(string $description = null)
 * @method static CollateralType SEVERAL_SECURITY(string $description = null)
 * @method static CollateralType SEVERAL_SECURITY_REAL_ESTATE_OF_HOUSING(string $description = null)
 * @method static CollateralType SEVERAL_COLLATERAL_WITH_LARGEST_REAL_ESTATE(string $description = null)
 * @method static CollateralType SEVERAL_COLLATERAL_WITH_FUTURE_LARGEST_REAL_ESTATE(string $description = null)
 * @method static CollateralType SEVERAL_COLLATERAL_MORTGAGE(string $description = null)
 * @method static CollateralType INTEGRAL_PROPERTY_COMPLEX_OBJECT(string $description = null)
 * @method static CollateralType EQUIPMENT(string $description = null)
 * @method static CollateralType SECURITIES_THAT_ENTERED_IN_EXCHANGE_REGISTER(string $description = null)
 * @method static CollateralType SECURITIES_ISSUED_BY_LOCAL_AUTHORITIES(string $description = null)
 * @method static CollateralType INVESTMENT_CERTIFICATES(string $description = null)
 * @method static CollateralType BIOLOGICAL_ASSETS(string $description = null)
 * @method static CollateralType PROPERTY_RIGHTS_PROPERTY_THAT_WILL_BELONG_NON_HOUSING_FUND(string $description = null)
 * @method static CollateralType GOVERNMENT_SECURITIES_ON_REPO_TRANSACTIONS(string $description = null)
 * @method static CollateralType MORTGAGE_BONDS_ISSUED_BY_FINANCIAL_INSTITUTION(string $description = null)
 * @method static CollateralType NOMINAL_SAVINGS(string $description = null)
 * @method static CollateralType SECURED_CASH_BANKS_GUARANTEES(string $description = null)
 * @method static CollateralType GOVERNMENT_COUNTRIES_GUARANTEES_WITH_RATING_A(string $description = null)
 * @method static CollateralType BANKS_GUARANTEES_WITH_CREDIT_RATING_A(string $description = null)
 * @method static CollateralType INTERNATIONAL_MULTILATERAL_BANKS_GUARANTEES(string $description = null)
 * @method static CollateralType GOVERNMENT_COUNTRIES_GUARANTEES_WITH_RATING_BBB(string $description = null)
 * @method static CollateralType BANKS_GUARANTEE_WITH_CREDIT_RATING_NOT_LOWER_BBB(string $description = null)
 * @method static CollateralType WITHOUT_COLLATERAL(string $description = null)
 * @method static CollateralType PLEDGE_OF_LAND(string $description = null)
 */
final class CollateralType extends Infrastructure\Dictionary
{
    public const LEGAL = 1;

    public const INDIVIDUAL = 2;

    /**
     * Guarantees of the Cabinet of Ministers
     */
    public const CABINET_MINISTERS_GUARANTEES = 11;

    /**
     * Guarantees of the National Bank of Ukraine
     */
    public const NATIONAL_BANK_GUARANTEES = 12;

    /**
     * Guarantees of international banks and "investment class" banks
     */
    public const INTERNATIONAL_BANKS_GUARANTEES = 13;

    /**
     * Guarantees of other banks in Ukraine
     */
    public const OTHER_BANKS_GUARANTEE = 14;

    /**
     * Property rights to cash deposits and registered money certificates
     */
    public const RIGHT_PROPERTY_TO_CASH_DEPOSITS = 15;

    /**
     * Guarantees of the governments of countries and banks rated at least "A"
     */
    public const BANKS_AND_COUNTRY_GUARANTEE_WITH_RATE_A = 16;

    /**
     * Property rights to cash placed on a deposit account with a bank with a rating not lower than the "investment
     * class"
     */
    public const RIGHT_PROPERTY_TO_CASH_PLACED_ON_DEPOSIT = 18;

    /**
     * Securities issued by the National Bank of Ukraine
     */
    public const SECURITIES_ISSUED_BY_NBU = 19;

    /**
     * Bonds of the state mortgage institution, placement of which was carried out under the guarantee of the Cabinet
     * of Ministers of Ukraine
     */
    public const BONDS_OF_STATE_MORTGAGE_INSTITUTION = 20;

    public const BANK_METALS = 21;

    public const PRECIOUS_METALS = 22;

    public const GOVERNMENT_SECURITIES = 23;

    public const NON_GOVERNMENT_SECURITIES = 24;

    public const REAL_ESTATE = 25;

    public const PROPERTY_RIGHTS_TO_FUTURE_REAL_ESTATE = 26;

    public const FINISHED_PRODUCTS = 27;

    public const STOCK_IN_TRADE = 28;

    public const MOTOR_TRANSPORT = 29;

    public const OTHER_MOVABLE_STATE = 30;

    public const OTHER_REAL_ESTATE = 31;

    public const PROPERTY_RIGHTS_TO_OTHER_COLLATERAL_OBJECTS = 32;

    public const OTHER_TYPES_OF_COLLATERAL = 33;

    public const GUARANTEE = 34;

    public const LIGHT_VEHICLES = 35;

    /**
     * The money cover, which is placed in the bank for a period not less than the period of using the asset
     */
    public const MONEY_COVER = 36;

    public const REAL_ESTATE_EXCEPT_FOR_HOUSING = 37;

    public const TRANSPORT_VEHICLES_EXCEPT_LIGHT_CARS = 38;

    public const MORTGAGE_BONDS = 39;

    public const SEVERAL_COLLATERAL = 40;

    public const SEVERAL_SECURITY = 41;

    /**
     * Several types of security, among which the value of property rights for the future real estate of the housing
     * stock - the largest
     */
    public const SEVERAL_SECURITY_REAL_ESTATE_OF_HOUSING = 42;

    /**
     * Several types of collateral, among which the value of other real estate is the largest
     */
    public const SEVERAL_COLLATERAL_WITH_LARGEST_REAL_ESTATE = 43;

    /**
     * Several types of collateral, among which the value of property rights for another future real estate is the
     * largest
     */
    public const SEVERAL_COLLATERAL_WITH_FUTURE_LARGEST_REAL_ESTATE = 44;

    /**
     * Several types of collateral, among which the cost of a mortgage is less than the value of other types of
     * collateral
     */
    public const SEVERAL_COLLATERAL_MORTGAGE = 45;

    public const INTEGRAL_PROPERTY_COMPLEX_OBJECT = 50;

    public const EQUIPMENT = 51;

    public const SECURITIES_THAT_ENTERED_IN_EXCHANGE_REGISTER = 52;

    public const SECURITIES_ISSUED_BY_LOCAL_AUTHORITIES = 53;

    public const INVESTMENT_CERTIFICATES = 54;

    public const BIOLOGICAL_ASSETS = 55;

    public const PROPERTY_RIGHTS_PROPERTY_THAT_WILL_BELONG_NON_HOUSING_FUND = 56;

    public const GOVERNMENT_SECURITIES_ON_REPO_TRANSACTIONS = 57;

    /**
     * Mortgage bonds issued by a financial institution with more than 50 percent of corporate rights owned by the
     * state and / or state banks
     */
    public const MORTGAGE_BONDS_ISSUED_BY_FINANCIAL_INSTITUTION = 58;

    /**
     * Nominal savings (deposit) certificates issued by the creditor bank, property rights to money placed on a deposit
     * account with a creditor bank for a period not less than the period of using the asset
     */
    public const NOMINAL_SAVINGS = 59;

    /**
     * Guarantees of banks of Ukraine, secured by a cash cover for a period not less than the period of using the asset
     */
    public const SECURED_CASH_BANKS_GUARANTEES = 60;

    /**
     * The guarantees of the governments of countries that have a credit rating are not lower than the A-
     */
    public const GOVERNMENT_COUNTRIES_GUARANTEES_WITH_RATING_A = 61;

    /**
     * Guarantees of banks and other institutions that have a credit rating are not lower than A-
     */
    public const BANKS_GUARANTEES_WITH_CREDIT_RATING_A = 62;

    public const INTERNATIONAL_MULTILATERAL_BANKS_GUARANTEES = 63;

    /**
     * The guarantees of the governments of countries that have a credit rating are not lower than the BBB-
     */
    public const GOVERNMENT_COUNTRIES_GUARANTEES_WITH_RATING_BBB = 64;

    /**
     * Guarantees of banks that have a credit rating are not lower than BBB-
     */
    public const BANKS_GUARANTEE_WITH_CREDIT_RATING_NOT_LOWER_BBB = 65;

    public const WITHOUT_COLLATERAL = 90;

    public const PLEDGE_OF_LAND = 91;
}
