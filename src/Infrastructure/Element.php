<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Element
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class Element implements ElementInterface
{
    use ElementTrait;

    public const TAG = null;
}
