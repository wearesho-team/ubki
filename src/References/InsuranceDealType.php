<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class InsuranceDealType
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static static CASCO(string $description = null)
 * @method static static OSAGO(string $description = null)
 * @method static static ACCIDENT(string $description = null)
 */
final class InsuranceDealType extends Reference
{
    public const CASCO = 1;
    public const OSAGO = 2;
    public const ACCIDENT = 3;
}
