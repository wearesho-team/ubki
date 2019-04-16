<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class LegalPerson
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static LegalPerson make(...$arguments)
 */
class LegalPerson extends IdentifiedPerson implements Ubki\Contract\Data\LegalPerson, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var string|null */
    protected $egrpou;

    /** @var Ubki\Dictionary\Ownership|null */
    protected $ownership;

    /** @var Ubki\Dictionary\EconomyBranch|null */
    protected $economyBranch;

    /** @var string|null */
    protected $activityType;

    /** @var \DateTimeInterface|null */
    protected $edrRegistrationDate;

    /** @var \DateTimeInterface|null */
    protected $taxRegistrationDate;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionary\Language $language,
        string $name,
        string $egrpou = \null,
        Ubki\Dictionary\Ownership $ownership = \null,
        Ubki\Dictionary\EconomyBranch $economyBranch = \null,
        string $activityType = \null,
        \DateTimeInterface $edrRegistrationDate = \null,
        \DateTimeInterface $taxRegistrationDate = \null
    ) {
        Ubki\Validator::OKPO()->validate($egrpou);
        Ubki\Validator::JUST_TEXT_250()->validate($name);
        Ubki\Validator::TEXT_100()->validate($activityType);

        $this->egrpou = $egrpou;
        $this->ownership = $ownership;
        $this->economyBranch = $economyBranch;
        $this->activityType = $activityType;
        $this->edrRegistrationDate = $edrRegistrationDate;
        $this->taxRegistrationDate = $taxRegistrationDate;

        parent::__construct($createdAt, $language, $name);
    }

    public function jsonSerialize(): array
    {
        return \array_merge(parent::jsonSerialize(), [
            'egrpou' => $this->egrpou,
            'ownership' => $this->ownership,
            'economyBranch' => $this->economyBranch,
            'activityType' => $this->activityType,
            'edrRegistrationDate' => Carbon::make($this->edrRegistrationDate),
            'taxRegistrationDate' => Carbon::make($this->taxRegistrationDate),
        ]);
    }

    public static function tag(): string
    {
        return 'ur' . parent::tag();
    }

    public function getActivityType(): ?string
    {
        return $this->activityType;
    }

    public function getEgrpou(): ?string
    {
        return $this->egrpou;
    }

    public function getOwnership(): ?Ubki\Dictionary\Ownership
    {
        return $this->ownership;
    }

    public function getEconomyBranch(): ?Ubki\Dictionary\EconomyBranch
    {
        return $this->economyBranch;
    }

    public function getEdrRegistrationDate(): ?\DateTimeInterface
    {
        return $this->edrRegistrationDate;
    }

    public function getTaxRegistrationDate(): ?\DateTimeInterface
    {
        return $this->taxRegistrationDate;
    }
}
