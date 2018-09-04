<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Interface Photo
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Photo extends Element
{
    public const TAG = 'foto';
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';
    public const PHOTO = 'foto';

    public function getCreatedAt(): \DateTimeInterface;

    public function getPhoto(): string;

    public function getInn(): ?string;
}
