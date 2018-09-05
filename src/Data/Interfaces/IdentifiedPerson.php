<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\Dictionaries\Language;

/**
 * Interface IdentifiedPerson
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface IdentifiedPerson extends Person
{
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const LANGUAGE_REF = 'lngref';

    public function getCreatedAt(): \DateTimeInterface;

    public function getLanguage(): Language;
}
