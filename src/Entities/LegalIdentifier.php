<?php

namespace Wearesho\Bobra\Ubki\Entities;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\References;

/**
 * Class LegalIdentifier
 * @package Wearesho\Bobra\Ubki\Entities
 */
class LegalIdentifier extends Identifier implements \JsonSerializable
{
    public const TAG = 'urident';

    public const ERGPOU = 'okpo';
    public const NAME = 'urname';
    public const FORM = 'urfrms';
    public const FORM_REF = 'urfrmsref';
    public const ECONOMY_BRANCH = 'ureconom';
    public const ECONOMY_BRANCH_REF = 'ureconomref';
    public const ACTIVITY_TYPE = 'urvide';
    public const ACTIVITY_TYPE_REF = 'urvideref';
    public const EDR_REGISTRATION_DATE = 'urdatreg';
    public const TAX_REGISTRATION_DATE = 'urdatregnal';

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

    public function __construct(
        \DateTimeInterface $createdAt,
        References\Language $language,
        string $name,
        ?string $ergpou,
        ?int $form,
        ?string $economyBranch,
        ?string $activityType,
        ?\DateTimeInterface $edrRegistrationDate,
        ?\DateTimeInterface $taxRegistrationDate
    ) {
        $this->ergpou = $ergpou;
        $this->form = $form;
        $this->economyBranch = $economyBranch;
        $this->activityType = $activityType;
        $this->edrRegistrationDate = $edrRegistrationDate;
        $this->taxRegistrationDate = $taxRegistrationDate;

        parent::__construct($createdAt, $language, $name);
    }


    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'ergpou' => $this->ergpou,
                'form' => $this->form,
                'economyBranch' => $this->economyBranch,
                'activityType' => $this->activityType,
                'edrRegistrationDate' => Carbon::instance($this->edrRegistrationDate)->toDateString(),
                'taxRegistrationDate' => Carbon::instance($this->taxRegistrationDate)->toDateString()
            ]
        );
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
