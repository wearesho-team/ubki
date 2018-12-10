<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Interface BlockInterface
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
interface BlockInterface extends ElementInterface
{
    public const TAG = 'comp';
    public const ATTR_ID = 'id';

    public function getId(): int;
}
