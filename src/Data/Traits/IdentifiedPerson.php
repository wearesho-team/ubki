<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki\Dictionary\Language;

/**
 * Trait IdentifiedPerson
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait IdentifiedPerson
{
    use Person;

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
