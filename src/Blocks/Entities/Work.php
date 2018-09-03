<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Blocks;

/**
 * Class Work
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Work implements Blocks\Interfaces\Work
{
    use Blocks\Traits\Work;

    public function __construct(
        \DateTimeInterface $createdAt,
        References\Language $language,
        string $ergpou,
        string $name,
        ?References\IdentifierRank $rank = null,
        ?int $experience = null,
        ?float $income = null
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->ergpou = $ergpou;
        $this->name = $name;
        $this->rank = $rank;
        $this->experience = $experience;
        $this->income = $income;
    }
}
