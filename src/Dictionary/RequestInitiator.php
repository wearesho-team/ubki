<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class RequestInitiator
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static RequestInitiator PARTNER(string $description = \null)
 * @method static RequestInitiator SKI(string $description = \null)
 * @method static RequestInitiator CERTIFICATED_SKI(string $description = \null)
 * @method static RequestInitiator COURT(string $description = \null)
 */
final class RequestInitiator extends Dictionary
{
    public const PARTNER = 1;
    public const SKI = 2;
    public const CERTIFICATED_SKI = 3;
    public const COURT = 4;
}
