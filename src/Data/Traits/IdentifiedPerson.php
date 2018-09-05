<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki\Dictionaries\Language;

/**
 * Trait IdentifiedPerson
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait IdentifiedPerson
{
    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Language */
    protected $language;

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Language
    {
        return $this->language;
    }
}
