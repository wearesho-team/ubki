<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Interface ElementInterface
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
interface ElementInterface extends \JsonSerializable
{
    public function tag(): string;

    /**
     * @internal
     * @return array
     */
    public function associativeAttributes(): array;
}
