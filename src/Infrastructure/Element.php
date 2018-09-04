<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Element
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class Element extends \JsonSerializable
{
    /**
     * Name of tag
     *
     * @return string
     */
    abstract public function tag(): string;
}
