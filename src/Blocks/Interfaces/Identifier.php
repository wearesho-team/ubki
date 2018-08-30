<?php

namespace Wearesho\Bobra\Ubki\Blocks\Interfaces;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\References;

/**
 * Interface Identifier
 * @package Wearesho\Bobra\Ubki\Blocks\Interfaces
 */
interface Identifier extends ElementInterface
{
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const LANGUAGE_REF = 'lngref';

    public function getCreatedAt(): \DateTimeInterface;

    public function getLanguage(): References\Language;

    public function getName(): string;
}
