<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Interface ElementInterface
 * @package Wearesho\Bobra\Ubki
 */
interface ElementInterface extends \JsonSerializable
{
    public static function tag(): string;
}
