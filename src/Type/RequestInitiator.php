<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class RequestInitiator
 * @package Wearesho\Bobra\Ubki\Type
 *
 * @method static static PARTNER(string $description = null)
 * @method static static SKI(string $description = null)
 * @method static static CERTIFICATED_SKI(string $description = null)
 * @method static static COURT(string $description = null)
 */
final class RequestInitiator extends Reference
{
    public const PARTNER = 1;
    public const SKI = 2;
    public const CERTIFICATED_SKI = 3;
    public const COURT = 4;
}
