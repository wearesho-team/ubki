<?php

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface Contact
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface Contact
{
    public const VALUE = 'cval';
    public const TYPE = 'ctype';
    public const TYPE_REF = 'typeref';
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';

    public function getCreatedAt(): \DateTimeInterface;

    public function getValue(): string;

    public function getType(): Ubki\Dictionary\Contact;

    public function getInn(): ?string;
}
