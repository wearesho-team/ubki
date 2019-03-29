<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface Contact
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Contact extends Ubki\Infrastructure\ElementInterface
{
    public const VALUE = 'cval';
    public const TYPE = 'ctype';
    public const TYPE_REF = 'typeref';
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';

    public function getCreatedAt(): \DateTimeInterface;

    public function getValue(): string;

    public function getType(): Ubki\Dictionary\ContactType;

    public function getInn(): ?string;
}
