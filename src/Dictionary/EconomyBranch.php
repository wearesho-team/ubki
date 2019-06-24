<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class EconomyBranch
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static EconomyBranch AGRICULTURE(string $description = \null)
 * @method static EconomyBranch MINING_INDUSTRY(string $description = \null)
 * @method static EconomyBranch PROCESSING_INDUSTRY(string $description = \null)
 * @method static EconomyBranch SUPPLY_ELECTRICITY_GAS_AIR(string $description = \null)
 * @method static EconomyBranch WATER_SUPPLY_SEWAGE(string $description = \null)
 * @method static EconomyBranch BUILDING(string $description = \null)
 * @method static EconomyBranch WHOLESALE_AND_RETAIL_TRADE_IN(string $description = \null)
 * @method static EconomyBranch TRANSPORT_OR_STORAGE_FACILITIES_OR_COURIER_ACTIVITIES(string $description = \null)
 * @method static EconomyBranch TEMPORARY_ACCOMMODATION_OR_CATERING(string $description = \null)
 * @method static EconomyBranch INFORMATION_OR_TELECOMMUNICATIONS(string $description = \null)
 * @method static EconomyBranch FINANCIAL_OR_INSURANCE_ACTIVITIES(string $description = \null)
 * @method static EconomyBranch REAL_ESTATE_OPERATIONS(string $description = \null)
 * @method static EconomyBranch PROFESSIONAL_OR_SCIENTIFIC_OR_TECHNICAL_ACTIVITIES(string $description = \null)
 * @method static EconomyBranch ADMINISTRATIVE_OR_SUPPORT_SERVICES_1(string $description = \null)
 * @method static EconomyBranch ADMINISTRATIVE_OR_SUPPORT_SERVICES_2(string $description = \null)
 * @method static EconomyBranch EDUCATION(string $description = \null)
 * @method static EconomyBranch HEALTH_OR_SOCIAL_CARE(string $description = \null)
 * @method static EconomyBranch ARTS_OR_SPORTS_OR_ENTERTAINMENT_OR_RECREATION(string $description = \null)
 * @method static EconomyBranch PROVIDING_OTHER_TYPES_OF_SERVICES(string $description = \null)
 * @method static EconomyBranch HOUSEHOLD_ACTIVITIES(string $description = \null)
 * @method static EconomyBranch ACTIVITIES_OF_EXTRATERRITORIAL_ORGANIZATIONS_AND_BODIES(string $description = \null)
 */
final class EconomyBranch extends Dictionary
{
    public const AGRICULTURE = 'A';
    public const MINING_INDUSTRY = 'B';
    public const PROCESSING_INDUSTRY = 'C';
    public const SUPPLY_ELECTRICITY_GAS_AIR = 'D';
    public const WATER_SUPPLY_SEWAGE = 'E';
    public const BUILDING = 'F';
    public const WHOLESALE_AND_RETAIL_TRADE_IN = 'G';
    public const TRANSPORT_OR_STORAGE_FACILITIES_OR_COURIER_ACTIVITIES = 'H';
    public const TEMPORARY_ACCOMMODATION_OR_CATERING = 'I';
    public const INFORMATION_OR_TELECOMMUNICATIONS = 'J';
    public const FINANCIAL_OR_INSURANCE_ACTIVITIES = 'K';
    public const REAL_ESTATE_OPERATIONS = 'L';
    public const PROFESSIONAL_OR_SCIENTIFIC_OR_TECHNICAL_ACTIVITIES = 'M';
    public const ADMINISTRATIVE_OR_SUPPORT_SERVICES_1 = 'N';
    public const ADMINISTRATIVE_OR_SUPPORT_SERVICES_2 = 'O';
    public const EDUCATION = 'P';
    public const HEALTH_OR_SOCIAL_CARE = 'Q';
    public const ARTS_OR_SPORTS_OR_ENTERTAINMENT_OR_RECREATION = 'R';
    public const PROVIDING_OTHER_TYPES_OF_SERVICES = 'S';
    public const HOUSEHOLD_ACTIVITIES = 'T';
    public const ACTIVITIES_OF_EXTRATERRITORIAL_ORGANIZATIONS_AND_BODIES = 'U';
}
