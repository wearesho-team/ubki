<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Trait LegalPerson
 * @package Wearesho\Bobra\Ubki\Data\Traits
 * @todo: implement ECONOMY_BRANCH dictionary
 * @todo: implement FORM dictionary
 * @todo: implement ACTIVITY_TYPE dictionary
 */
trait LegalPerson
{
    use IdentifiedPerson;

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
            Interfaces\IdentifiedPerson::CREATED_AT => $this->getCreatedAt(),
            Interfaces\IdentifiedPerson::LANGUAGE => $this->getLanguage(),
            Interfaces\LegalPerson::NAME => $this->getName(),
            Interfaces\LegalPerson::ERGPOU => $this->getErgpou(),
            Interfaces\LegalPerson::FORM => $this->getForm(),
            Interfaces\LegalPerson::ECONOMY_BRANCH => $this->getEconomyBranch(),
            Interfaces\LegalPerson::ACTIVITY_TYPE => $this->getActivityType(),
            Interfaces\LegalPerson::EDR_REGISTRATION_DATE => $this->getEdrRegistrationDate(),
            Interfaces\LegalPerson::TAX_REGISTRATION_DATE => $this->getTaxRegistrationDate(),
        ];
    }

    public function tag(): string
    {
        return Interfaces\LegalPerson::LEGAL_PREFIX . Interfaces\Person::TAG;
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
