<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class InsuranceDealType
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static static CASCO(string $description = null)
 * @method static static OSAGO(string $description = null)
 * @method static static ACCIDENT(string $description = null)
 */
final class InsuranceDealType extends Infrastructure\Dictionary
{
    public const CASCO = 1;
    public const OSAGO = 2;
    public const ACCIDENT = 3;
}
