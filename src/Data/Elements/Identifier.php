<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Identifier
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
abstract class Identifier implements Data\Interfaces\Identifier
{
    use Data\Traits\Identifier;

    public function __construct(
        \DateTimeInterface $createdAt,
        Dictionaries\Language $language,
        string $name
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->name = $name;
    }
}
