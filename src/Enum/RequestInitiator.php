<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class RequestInitiator
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static RequestInitiator PARTNER()
 * @method static RequestInitiator SKI()
 * @method static RequestInitiator CERTIFICATED_SKI()
 * @method static RequestInitiator COURT()
 */
final class RequestInitiator extends Enum
{
    public const PARTNER = 1;
    public const SKI = 2;
    public const CERTIFICATED_SKI = 3;
    public const COURT = 4;
}
