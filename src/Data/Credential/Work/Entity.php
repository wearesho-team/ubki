<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Work;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Work
 *
 * @property-read \DateTimeInterface $createdAt
 * @property-read Ubki\Data\Language $language
 * @property-read Rank|null          $rank
 * @property-read string             $ergpou
 * @property-read string             $name
 * @property-read int|null           $experience
 * @property-read float|null         $income
 */
class Entity extends Ubki\Element implements \JsonSerializable
{
    public const TAG = 'work';

    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const RANK = 'cdolgn';
    public const ERGPOU = 'wokpo';
    public const NAME = 'wname';
    public const EXPERIENCE = 'wstag';
    public const INCOME = 'wdohod';

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Data\Language $language,
        string $ergpou,
        string $name,
        ?Rank $rank = null,
        ?int $experience = null,
        ?float $income = null
    ) {
        parent::__construct([
            'createdAt' => $createdAt,
            'language' => $language,
            'rank' => $rank,
            'ergpou' => $ergpou,
            'name' => $name,
            'experience' => $experience,
            'income' => $income
        ]);
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'language' => (string)$this->language,
            'ergpou' => $this->ergpou,
            'name' => $this->name,
            'rank' => (string)$this->rank,
            'experience' => $this->experience,
            'income' => $this->income
        ];
    }
}
