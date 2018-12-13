<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

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

    public function associativeAttributes(): array
    {
        return [
            Ubki\Data\Interfaces\LegalPerson::CREATED_AT => $this->getCreatedAt(),
            Ubki\Data\Interfaces\LegalPerson::LANGUAGE => $this->getLanguage(),
            Ubki\Data\Interfaces\LegalPerson::ERGPOU => $this->getErgpou(),
            Ubki\Data\Interfaces\LegalPerson::NAME => $this->getName(),
            Ubki\Data\Interfaces\LegalPerson::FORM => $this->getForm(),
            Ubki\Data\Interfaces\LegalPerson::ECONOMY_BRANCH => $this->getEconomyBranch(),
            Ubki\Data\Interfaces\LegalPerson::ACTIVITY_TYPE => $this->getActivityType(),
            Ubki\Data\Interfaces\LegalPerson::EDR_REGISTRATION_DATE => $this->getEdrRegistrationDate(),
            Ubki\Data\Interfaces\LegalPerson::TAX_REGISTRATION_DATE => $this->getTaxRegistrationDate()
        ];
    }
}
