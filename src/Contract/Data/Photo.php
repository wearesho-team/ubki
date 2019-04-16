<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

/**
 * Interface Photo
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface Photo
{
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';
    public const PHOTO = 'foto';

    public function getCreatedAt(): \DateTimeInterface;

    public function getUri(): string;

    public function getInn(): ?string;
}
