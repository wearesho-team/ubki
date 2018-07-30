<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Identifier;

use Wearesho\Bobra\Ubki;

/**
 * Interface Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Identifier
 */
interface Person
{
    public function getCreatedAt(): \DateTimeInterface;

    public function getLanguage(): Ubki\Data\Language;

    public function getName(): string;
}
