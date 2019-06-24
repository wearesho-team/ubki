<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface IdentifiedPerson
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface IdentifiedPerson
{
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const LANGUAGE_REF = 'lngref';

    public function getCreatedAt(): \DateTimeInterface;

    public function getLanguage(): Ubki\Dictionary\Language;
}
