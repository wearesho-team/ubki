<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Work
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Work make(...$arguments)
 */
class Work implements Ubki\Contract\Data\Work, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Ubki\Dictionary\Language */
    protected $language;

    /** @var string */
    protected $egrpou;

    /** @var string */
    protected $name;

    /** @var Ubki\Dictionary\IdentifierRank|null */
    protected $rank;

    /** @var int|null */
    protected $experience;

    /** @var float|null */
    protected $income;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionary\Language $language,
        string $egrpou,
        string $name,
        Ubki\Dictionary\IdentifierRank $rank = \null,
        int $experience = \null,
        float $income = \null
    ) {
        Ubki\Validator::TWO_NUMBER()->validate((string)$experience, \true);
        Ubki\Validator::BIG_FLOAT()->validate((string)$income, \true);
        Ubki\Validator::WORK_NAME()->validate($name);
        Ubki\Validator::OKPO_UNICODE()->validate($egrpou);

        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->egrpou = $egrpou;
        $this->name = $name;
        $this->rank = $rank;
        $this->experience = $experience;
        $this->income = $income;
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::make($this->createdAt),
            'language' => $this->language,
            'egrpou' => $this->egrpou,
            'name' => $this->name,
            'rank' => $this->rank,
            'experience' => $this->experience,
            'income' => $this->income,
        ];
    }

    public static function tag(): string
    {
        return 'work';
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Ubki\Dictionary\Language
    {
        return $this->language;
    }

    public function getEgrpou(): string
    {
        return $this->egrpou;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRank(): ?Ubki\Dictionary\IdentifierRank
    {
        return $this->rank;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function getIncome(): ?float
    {
        return $this->income;
    }
}
