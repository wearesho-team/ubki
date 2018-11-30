<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class InformationProcessingMode
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static InformationProcessingMode INSERT()
 * @method static InformationProcessingMode UPDATE()
 * @method static InformationProcessingMode DELETE()
 */
final class InformationProcessingMode extends RequestTemplate
{
    public const INSERT = 'i';
    public const UPDATE = 'u';
    public const DELETE = 'd';
}
