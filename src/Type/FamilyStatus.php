<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class FamilyStatus
 * @package Wearesho\Bobra\Ubki\Type
 *
 * @method static static SINGLE(string $description = null)
 * @method static static MARRIED(string $description = null)
 * @method static static DIVORCED(string $description = null)
 * @method static static WIDOW(string $description = null)
 * @method static static CIVIL(string $description = null)
 */
final class FamilyStatus extends Ubki\Reference
{
    public const SINGLE = 1;
    public const MARRIED = 2;
    public const DIVORCED = 3;
    public const WIDOW = 4;
    public const CIVIL = 5;
}
