<?php

namespace Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Interface Photo
 * @package Wearesho\Bobra\Ubki\Blocks\Interfaces
 */
interface Photo extends \JsonSerializable
{
    public const TAG = 'foto';
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';
    public const PHOTO = 'foto';

    public function getCreatedAt(): \DateTimeInterface;

    public function getPhoto(): string;

    public function getInn(): ?string;
}
