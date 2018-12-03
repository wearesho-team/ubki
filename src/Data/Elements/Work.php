<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class Work
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Work implements Ubki\Data\Interfaces\Work
{
    use Ubki\Data\Traits\Work;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionaries\Language $language,
        string $ergpou,
        string $name,
        Ubki\Dictionaries\IdentifierRank $rank = null,
        int $experience = null,
        float $income = null
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
