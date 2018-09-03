<?php

namespace Wearesho\Bobra\Ubki\Blocks\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Trait LegalIdentifier
 * @package Wearesho\Bobra\Ubki\Blocks\Traits
 */
trait LegalIdentifier
{
    use Identifier;
    use ElementTrait;

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
        return array_merge(parent::jsonSerialize(), [
            'ergpou' => $this->ergpou,
            'form' => $this->form,
            'economyBranch' => $this->economyBranch,
            'activityType' => $this->activityType,
            'edrRegistrationDate' => Carbon::instance($this->edrRegistrationDate)->toDateString(),
            'taxRegistrationDate' => Carbon::instance($this->taxRegistrationDate)->toDateString()
        ]);
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
