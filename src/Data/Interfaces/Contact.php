<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\References\ContactType;

/**
 * Interface Contact
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Contact extends ElementInterface
{
    public const TAG = 'cont';
    public const VALUE = 'cval';
    public const TYPE = 'ctype';
    public const TYPE_REF = 'typeref';
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';

    public function getCreatedAt(): \DateTimeInterface;

    public function getValue(): string;

    public function getType(): ContactType;

    public function getInn(): ?string;
}
