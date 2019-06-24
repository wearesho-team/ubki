<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

/**
 * Interface Comment
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface Comment
{
    public const ID = 'id';
    public const TEXT = 'text';

    public function getId(): ?string;

    public function getText(): string;
}
