<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class CourtDealType
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static CourtDealType CIVIL()
 * @method static CourtDealType LABOR()
 * @method static CourtDealType ADMINISTRATIVE()
 * @method static CourtDealType CRIMINAL()
 * @method static CourtDealType ECONOMIC()
 * @method static CourtDealType PROBLEM_LOANS()
 * @method static CourtDealType COMPLEX_CLAIMS()
 */
class CourtDealType extends Enum
{
    public const CIVIL = 1;
    public const LABOR = 2;
    public const ADMINISTRATIVE = 3;
    public const CRIMINAL = 4;
    public const ECONOMIC = 5;
    public const PROBLEM_LOANS = 6;
    public const COMPLEX_CLAIMS = 7;
}
