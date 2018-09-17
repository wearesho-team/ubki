<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Class Work
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Work extends Element implements Data\Interfaces\Work
{
    use Data\Traits\Work;

    public function __construct(
        \DateTimeInterface $createdAt,
        Dictionaries\Language $language,
        string $ergpou,
        string $name,
        Dictionaries\IdentifierRank $rank = null,
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

        parent::__construct();
    }
}
