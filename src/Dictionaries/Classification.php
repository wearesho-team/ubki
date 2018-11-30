<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class RegistrationSpd
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static Classification INDIVIDUAL(string $description = null)
 * @method static Classification ENTREPRENEUR(string $description = null)
 */
final class Classification extends Infrastructure\Dictionary
{
    public const INDIVIDUAL = 1;
    public const ENTREPRENEUR = 2;
}
