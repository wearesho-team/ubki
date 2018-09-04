<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class CourtDealType
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static static CIVIL(string $description = null)
 * @method static static LABOR(string $description = null)
 * @method static static ADMINISTRATIVE(string $description = null)
 * @method static static CRIMINAL(string $description = null)
 * @method static static ECONOMIC(string $description = null)
 * @method static static PROBLEM_LOANS(string $description = null)
 * @method static static COMPLEX_CLAIMS(string $description = null)
 */
final class CourtDealType extends Infrastructure\Dictionary
{
    public const CIVIL = 1;
    public const LABOR = 2;
    public const ADMINISTRATIVE = 3;
    public const CRIMINAL = 4;
    public const ECONOMIC = 5;
    public const PROBLEM_LOANS = 6;
    public const COMPLEX_CLAIMS = 7;
}
