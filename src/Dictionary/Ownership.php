<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Ownership
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static Ownership BUSINESSES(string $description = \null)
 * @method static Ownership FARM(string $description = \null)
 * @method static Ownership PRIVATE_ENTERPRISE(string $description = \null)
 * @method static Ownership COLLECTIVE_ENTERPRISE(string $description = \null)
 * @method static Ownership STATE_ENTERPRISE(string $description = \null)
 * @method static Ownership STATE_OWNED_ENTERPRISE(string $description = \null)
 * @method static Ownership UTILITY_COMPANY(string $description = \null)
 * @method static Ownership SUBSIDIARY(string $description = \null)
 * @method static Ownership FOREIGN_COMPANY(string $description = \null)
 * @method static Ownership ENTERPRISE_ASSOCIATION_1(string $description = \null)
 * @method static Ownership ENTERPRISE_ASSOCIATION_2(string $description = \null)
 * @method static Ownership ENTERPRISE_ASSOCIATION_3(string $description = \null)
 * @method static Ownership INDIVIDUAL_ENTERPRISE(string $description = \null)
 * @method static Ownership FAMILY_BUSINESS(string $description = \null)
 * @method static Ownership JOINT_VENTURE(string $description = \null)
 * @method static Ownership BUSINESS_SOCIETIES(string $description = \null)
 * @method static Ownership JOINT_STOCK_COMPANY(string $description = \null)
 * @method static Ownership PUBLIC_JOINT_STOCK_COMPANY(string $description = \null)
 * @method static Ownership PRIVATE_JOINT_STOCK_COMPANY(string $description = \null)
 * @method static Ownership STATE_JOINT_STOCK_COMPANY(string $description = \null)
 * @method static Ownership LIMITED_LIABILITY_COMPANY(string $description = \null)
 * @method static Ownership ADDITIONAL_LIABILITY_COMPANY(string $description = \null)
 * @method static Ownership FULL_COMPANY(string $description = \null)
 * @method static Ownership LIMITED_PARTNERSHIP(string $description = \null)
 * @method static Ownership COOPERATIVES(string $description = \null)
 * @method static Ownership PRODUCTION_COOPERATIVE(string $description = \null)
 * @method static Ownership SERVING_COOPERATIVE(string $description = \null)
 * @method static Ownership HOUSING_COOPERATIVE(string $description = \null)
 * @method static Ownership GARAGE_COOPERATIVE(string $description = \null)
 * @method static Ownership CONSUMER_COOPERATIVE(string $description = \null)
 * @method static Ownership AGRICULTURAL_PRODUCTION_COOPERATIVE(string $description = \null)
 * @method static Ownership AGRICULTURAL_SERVICE_COOPERATIVE(string $description = \null)
 * @method static Ownership COOPERATIVE_BANK(string $description = \null)
 * @method static Ownership ORGANIZATIONS(string $description = \null)
 * @method static Ownership EXECUTIVE_AUTHORITY(string $description = \null)
 * @method static Ownership LOCAL_GOVERNMENT(string $description = \null)
 * @method static Ownership STATE_ORGANIZATION(string $description = \null)
 * @method static Ownership COMMUNITY_ORGANIZATION(string $description = \null)
 * @method static Ownership PRIVATE_ORGANIZATION(string $description = \null)
 * @method static Ownership CITIZEN_ASSOCIATION(string $description = \null)
 * @method static Ownership TENANT_ORGANIZATION_1(string $description = \null)
 * @method static Ownership TENANT_ORGANIZATION_2(string $description = \null)
 * @method static Ownership BUSINESS_COMBINATION(string $description = \null)
 * @method static Ownership ASSOCIATION(string $description = \null)
 * @method static Ownership CORPORATION(string $description = \null)
 * @method static Ownership CONSORTIUM(string $description = \null)
 * @method static Ownership CONCERN(string $description = \null)
 * @method static Ownership HOLDING_COMPANY(string $description = \null)
 * @method static Ownership OTHER_LEGAL_ENTITIES_ASSOCIATIONS(string $description = \null)
 * @method static Ownership SEPARATE_UNITS_WITHOUT_LEGAL_ENTITY_STATUS(string $description = \null)
 * @method static Ownership BRANCH(string $description = \null)
 * @method static Ownership REPRESENTATION(string $description = \null)
 * @method static Ownership OTHER_UNIONS(string $description = \null)
 * @method static Ownership POLITICAL_PARTY(string $description = \null)
 * @method static Ownership SOCIAL_ORGANIZATION(string $description = \null)
 * @method static Ownership CITIZENS_ASSOCIATIONS_UNION(string $description = \null)
 * @method static Ownership RELIGIOUS_ORGANIZATION(string $description = \null)
 * @method static Ownership UNION(string $description = \null)
 * @method static Ownership UNION_OF_TRADE_UNIONS(string $description = \null)
 * @method static Ownership CREATIVE_UNION(string $description = \null)
 * @method static Ownership CHARITY_ORGANIZATION_1(string $description = \null)
 * @method static Ownership CHARITY_ORGANIZATION_2(string $description = \null)
 * @method static Ownership CO_OWNERS_OF_APARTMENT_BUILDING_ASSOCIATION(string $description = \null)
 * @method static Ownership BODY_SELF_ORGANIZATION_OF_POPULATION(string $description = \null)
 * @method static Ownership OTHER_LEGAL_FORMS_1(string $description = \null)
 * @method static Ownership ENTREPRENEUR(string $description = \null)
 * @method static Ownership COMMODITY_EXCHANGE(string $description = \null)
 * @method static Ownership STOCK_EXCHANGE(string $description = \null)
 * @method static Ownership CREDIT_UNION(string $description = \null)
 * @method static Ownership CONSUMER_SOCIETY(string $description = \null)
 * @method static Ownership CONSUMER_SOCIETIES_UNION(string $description = \null)
 * @method static Ownership NON_STATE_PENSION_FUND(string $description = \null)
 * @method static Ownership HORTICULTURAL_SOCIETY(string $description = \null)
 * @method static Ownership OTHER_LEGAL_FORMS_2(string $description = \null)
 */
final class Ownership extends Dictionary
{
    public const BUSINESSES = 100;
    public const FARM = 110;
    public const PRIVATE_ENTERPRISE = 120;
    public const COLLECTIVE_ENTERPRISE = 130;
    public const STATE_ENTERPRISE = 140;
    public const STATE_OWNED_ENTERPRISE = 145;
    public const UTILITY_COMPANY = 150;
    public const SUBSIDIARY = 160;
    public const FOREIGN_COMPANY = 170;
    public const ENTERPRISE_ASSOCIATION_1 = 180;
    public const ENTERPRISE_ASSOCIATION_2 = 185;
    public const ENTERPRISE_ASSOCIATION_3 = 190;
    public const INDIVIDUAL_ENTERPRISE = 191;
    public const FAMILY_BUSINESS = 192;
    public const JOINT_VENTURE = 193;
    public const BUSINESS_SOCIETIES = 200;
    public const JOINT_STOCK_COMPANY = 230;
    public const PUBLIC_JOINT_STOCK_COMPANY = 231;
    public const PRIVATE_JOINT_STOCK_COMPANY = 232;
    public const STATE_JOINT_STOCK_COMPANY = 235;
    public const LIMITED_LIABILITY_COMPANY = 240;
    public const ADDITIONAL_LIABILITY_COMPANY = 250;
    public const FULL_COMPANY = 260;
    public const LIMITED_PARTNERSHIP = 270;
    public const COOPERATIVES = 300;
    public const PRODUCTION_COOPERATIVE = 310;
    public const SERVING_COOPERATIVE = 320;
    public const HOUSING_COOPERATIVE = 321;
    public const GARAGE_COOPERATIVE = 322;
    public const CONSUMER_COOPERATIVE = 330;
    public const AGRICULTURAL_PRODUCTION_COOPERATIVE = 340;
    public const AGRICULTURAL_SERVICE_COOPERATIVE = 350;
    public const COOPERATIVE_BANK = 390;
    public const ORGANIZATIONS = 400;
    public const EXECUTIVE_AUTHORITY = 410;
    public const LOCAL_GOVERNMENT = 420;
    public const STATE_ORGANIZATION = 425;
    public const COMMUNITY_ORGANIZATION = 430;
    public const PRIVATE_ORGANIZATION = 435;
    public const CITIZEN_ASSOCIATION = 440;
    public const TENANT_ORGANIZATION_1 = 490;
    public const TENANT_ORGANIZATION_2 = 495;
    public const BUSINESS_COMBINATION = 500;
    public const ASSOCIATION = 510;
    public const CORPORATION = 520;
    public const CONSORTIUM = 530;
    public const CONCERN = 540;
    public const HOLDING_COMPANY = 550;
    public const OTHER_LEGAL_ENTITIES_ASSOCIATIONS = 590;
    public const SEPARATE_UNITS_WITHOUT_LEGAL_ENTITY_STATUS = 600;
    public const BRANCH = 610;
    public const REPRESENTATION = 620;
    public const OTHER_UNIONS = 800;
    public const POLITICAL_PARTY = 810;
    public const SOCIAL_ORGANIZATION = 815;
    public const CITIZENS_ASSOCIATIONS_UNION = 820;
    public const RELIGIOUS_ORGANIZATION = 825;
    public const UNION = 830;
    public const UNION_OF_TRADE_UNIONS = 835;
    public const CREATIVE_UNION = 840;
    public const CHARITY_ORGANIZATION_1 = 845;
    public const CHARITY_ORGANIZATION_2 = 850;
    public const CO_OWNERS_OF_APARTMENT_BUILDING_ASSOCIATION = 855;
    public const BODY_SELF_ORGANIZATION_OF_POPULATION = 860;
    public const OTHER_LEGAL_FORMS_1 = 900;
    public const ENTREPRENEUR = 910;
    public const COMMODITY_EXCHANGE = 915;
    public const STOCK_EXCHANGE = 920;
    public const CREDIT_UNION = 925;
    public const CONSUMER_SOCIETY = 930;
    public const CONSUMER_SOCIETIES_UNION = 935;
    public const NON_STATE_PENSION_FUND = 940;
    public const HORTICULTURAL_SOCIETY = 950;
    public const OTHER_LEGAL_FORMS_2 = 995;
}
