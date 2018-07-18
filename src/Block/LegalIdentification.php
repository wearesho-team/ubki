<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki\BaseBlock;

/**
 * Class LegalIdentification
 * @package Wearesho\Bobra\Ubki\Block
 */
class LegalIdentification extends BaseBlock
{
    // attributes
    public const ERGPOU = 'okpo';
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const NAME = 'urname';
    public const FORM = 'urfrms';
    public const ECONOMY_BRANCH = 'ureconom';
    public const ACTIVITY_TYPE = 'urvide';
    public const EDR_REGISTRATION_DATE = 'urdatreg';
    public const TAX_REGISTRATION_DATE = 'urdatregnal';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var int */
    protected $language;

    /** @var string */
    protected $name;

    /** @var int|null */
    protected $ergpou;

    /** @var int|null */
    protected $form;

    /** @var null|string */
    protected $economyBranch;

    /** @var null|string */
    protected $activityType;

    /** @var \DateTimeInterface|null */
    protected $edrRegistrationDate;

    /** @var \DateTimeInterface|null */
    protected $taxRegistrationDate;

    public function __construct(
        \DateTimeInterface $createdAt,
        int $language,
        string $name,
        ?int $ergpou = null,
        ?int $form = null,
        ?string $economyBranch = null,
        ?string $activityType = null,
        ?\DateTimeInterface $edrRegistrationDate = null,
        ?\DateTimeInterface $taxRegistrationDate = null
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->name = $name;
        $this->ergpou = $ergpou;
        $this->form = $form;
        $this->economyBranch = $economyBranch;
        $this->activityType = $activityType;
        $this->edrRegistrationDate = $edrRegistrationDate;
        $this->taxRegistrationDate = $taxRegistrationDate;
    }

    public function tag(): string
    {
        return 'urident';
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): int
    {
        return $this->language;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getErgpou(): ?int
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

    public function getActivityType(): ?string
    {
        return $this->activityType;
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
