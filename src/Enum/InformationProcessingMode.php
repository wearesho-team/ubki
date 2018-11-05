<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class InformationProcessingMode
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static InformationProcessingMode INSERT()
 * @method static InformationProcessingMode UPDATE()
 * @method static InformationProcessingMode DELETE()
 */
final class InformationProcessingMode extends Enum
{
    public const INSERT = 'i';
    public const UPDATE = 'u';
    public const DELETE = 'd';
}
