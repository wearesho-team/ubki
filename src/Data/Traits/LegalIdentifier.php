<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Trait LegalPerson
 * @package Wearesho\Bobra\Ubki\Data\Traits
 * @todo: implement ECONOMY_BRANCH dictionary
 * @todo: implement FORM dictionary
 * @todo: implement ACTIVITY_TYPE dictionary
 */
trait LegalIdentifier
{
    /** @var string|null */
    protected $ergpou;

    /** @var string|null */
    protected $form;

    /** @var string|null */
    protected $economyBranch;

    /** @var string|null */
    protected $activityType;

    /** @var \DateTimeInterface|null */
    protected $edrRegistrationDate;

    /** @var \DateTimeInterface|null */
    protected $taxRegistrationDate;

    public function jsonSerialize(): array
    {
        return [
            Interfaces\IdentifiedPerson::CREATED_AT => Carbon::instance($this->createdAt)->toDateString(),
            Interfaces\IdentifiedPerson::LANGUAGE => $this->language->getValue(),
            Interfaces\IdentifiedPerson::LANGUAGE_REF => $this->language->getDescription(),
            Interfaces\LegalIdentifier::ERGPOU => $this->ergpou,
            Interfaces\LegalIdentifier::FORM => $this->form,
            Interfaces\LegalIdentifier::ECONOMY_BRANCH => $this->economyBranch,
            Interfaces\LegalIdentifier::ACTIVITY_TYPE => $this->activityType,
            Interfaces\LegalIdentifier::EDR_REGISTRATION_DATE =>
                Carbon::instance($this->edrRegistrationDate)->toDateString(),
            Interfaces\LegalIdentifier::TAX_REGISTRATION_DATE =>
                Carbon::instance($this->taxRegistrationDate)->toDateString(),
        ];
    }

    public function tag(): string
    {
        return Interfaces\LegalIdentifier::TAG;
    }

    public function getActivityType(): ?string
    {
        return $this->activityType;
    }

    public function getErgpou(): ?string
    {
        return $this->ergpou;
    }

    public function getForm(): ?int
    {
        return $this->form;
    }

    public function getEconomyBranch(): ?string
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
