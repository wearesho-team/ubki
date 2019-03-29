<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class Work
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class Work extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\Work
{
    use Ubki\Data\Traits\Work;

    public const TAG = 'work';

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionary\Language $language,
        string $ergpou,
        string $name,
        Ubki\Dictionary\IdentifierRank $rank = null,
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
