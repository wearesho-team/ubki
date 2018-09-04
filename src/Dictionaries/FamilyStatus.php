<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class FamilyStatus
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static static SINGLE(string $description = null)
 * @method static static MARRIED(string $description = null)
 * @method static static DIVORCED(string $description = null)
 * @method static static WIDOW(string $description = null)
 * @method static static CIVIL(string $description = null)
 */
final class FamilyStatus extends Infrastructure\Dictionary
{
    public const SINGLE = 1;
    public const MARRIED = 2;
    public const DIVORCED = 3;
    public const WIDOW = 4;
    public const CIVIL = 5;
}
