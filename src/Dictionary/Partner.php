<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Partner
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static Partner OWN(string $description = null)
 * @method static Partner FOREIGN(string $description = null)
 */
final class Partner extends Dictionary
{
    public const OWN = 1;
    public const FOREIGN = 2;
}
