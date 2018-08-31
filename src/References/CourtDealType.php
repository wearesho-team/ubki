<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class CourtDealType
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static static CIVIL(string $description = null)
 * @method static static LABOR(string $description = null)
 * @method static static ADMINISTRATIVE(string $description = null)
 * @method static static CRIMINAL(string $description = null)
 * @method static static ECONOMIC(string $description = null)
 * @method static static PROBLEM_LOANS(string $description = null)
 * @method static static COMPLEX_CLAIMS(string $description = null)
 */
final class CourtDealType extends Reference
{
    public const CIVIL = 1;
    public const LABOR = 2;
    public const ADMINISTRATIVE = 3;
    public const CRIMINAL = 4;
    public const ECONOMIC = 5;
    public const PROBLEM_LOANS = 6;
    public const COMPLEX_CLAIMS = 7;
}
