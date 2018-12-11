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
