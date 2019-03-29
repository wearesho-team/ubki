<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class FamilyStatus
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static FamilyStatus SINGLE(string $description = null)
 * @method static FamilyStatus MARRIED(string $description = null)
 * @method static FamilyStatus DIVORCED(string $description = null)
 * @method static FamilyStatus WIDOW(string $description = null)
 * @method static FamilyStatus CIVIL(string $description = null)
 */
final class FamilyStatus extends Dictionary
{
    public const SINGLE = 1;
    public const MARRIED = 2;
    public const DIVORCED = 3;
    public const WIDOW = 4;
    public const CIVIL = 5;
}
