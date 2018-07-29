<?php

namespace Wearesho\Bobra\Ubki\Data\Identifier;

use Wearesho\Bobra\Ubki;

/**
 * Interface Entity
 * @package Wearesho\Bobra\Ubki\Data\Identifier
 */
interface Person
{
    public function getCreatedAt(): \DateTimeInterface;

    public function getLanguage(): Ubki\Data\Language;

    public function getName(): string;
}
