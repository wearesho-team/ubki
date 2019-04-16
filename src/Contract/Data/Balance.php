<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

/**
 * Interface Balance
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface Balance
{
    public function getValue(): float;

    public function getDate(): ?\DateTimeInterface;
}
