<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\ElementInterface;

/**
 * Interface Photo
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Photo extends ElementInterface
{
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';
    public const PHOTO = 'foto';

    public function getCreatedAt(): \DateTimeInterface;

    public function getUri(): string;

    public function getInn(): ?string;
}
