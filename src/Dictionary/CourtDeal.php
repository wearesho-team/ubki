<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class CourtDeal
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static CourtDeal CIVIL(string $description = \null)
 * @method static CourtDeal LABOR(string $description = \null)
 * @method static CourtDeal ADMINISTRATIVE(string $description = \null)
 * @method static CourtDeal CRIMINAL(string $description = \null)
 * @method static CourtDeal ECONOMIC(string $description = \null)
 * @method static CourtDeal PROBLEM_LOANS(string $description = \null)
 * @method static CourtDeal COMPLEX_CLAIMS(string $description = \null)
 */
final class CourtDeal extends Dictionary
{
    public const CIVIL = 1;
    public const LABOR = 2;
    public const ADMINISTRATIVE = 3;
    public const CRIMINAL = 4;
    public const ECONOMIC = 5;
    public const PROBLEM_LOANS = 6;
    public const COMPLEX_CLAIMS = 7;
}
