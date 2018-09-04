<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Interface Identifier
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Identifier extends Element
{
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const LANGUAGE_REF = 'lngref';

    public function getCreatedAt(): \DateTimeInterface;

    public function getLanguage(): Dictionaries\Language;

    public function getName(): string;
}
