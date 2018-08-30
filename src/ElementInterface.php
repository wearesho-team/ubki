<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Interface ElementInterface
 * @package Wearesho\Bobra\Ubki
 */
interface ElementInterface extends \JsonSerializable
{
    public function tag(): string;
}
