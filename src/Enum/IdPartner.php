<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class IdPartner
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static IdPartner OWN()
 * @method static IdPartner FOREIGN()
 */
final class IdPartner extends Enum
{
    public const OWN = 1;
    public const FOREIGN = 2;
}
