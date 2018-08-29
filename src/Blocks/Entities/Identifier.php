<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Blocks;

/**
 * Class Identifier
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
abstract class Identifier implements Blocks\Interfaces\Identifier
{
    use Blocks\Traits\Identifier;

    public function __construct(
        \DateTimeInterface $createdAt,
        References\Language $language,
        string $name
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->name = $name;
    }
}
