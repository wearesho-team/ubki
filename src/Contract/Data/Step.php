<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

/**
 * Interface Step
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface Step
{
    public function getName(): ?string;

    public function getStart(): ?\DateTimeInterface;

    public function getEnd(): ?\DateTimeInterface;
}
