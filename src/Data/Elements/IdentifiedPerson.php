<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\Rules\PersonName;

/**
 * Class IdentifiedPerson
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
abstract class IdentifiedPerson extends Person implements Data\Interfaces\IdentifiedPerson
{
    use Data\Traits\IdentifiedPerson;

    public function __construct(
        \DateTimeInterface $createdAt,
        Dictionaries\Language $language,
        string $name
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;

        parent::__construct($name);
    }

    public function rules(): ?RuleCollection
    {
        return new RuleCollection([
            PersonName::check(['name',])
        ]);
    }
}
