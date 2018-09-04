<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Work
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Work implements Data\Interfaces\Work
{
    use Data\Traits\Work;

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
