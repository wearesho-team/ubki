<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;

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

    public function getType(): Dictionaries\ContactType;

    public function getInn(): ?string;
}
