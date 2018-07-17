<?php

namespace Wearesho\Bobra\Ubki\Block;

/**
 * Class LegalIdentification
 * <urident> tag
 * @package Wearesho\Bobra\Ubki\Block
 */
class LegalIdentification
{
    public const TAG = 'urident';

    public const ERGPOU = 'okpo';
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const NAME = 'urname';
    public const FORM = 'urfrms';
    public const ECONOMY_BRANCH = 'ureconom';
    public const ACTIVITY_TYPE = 'urvide';
    public const EDR_REGISTRATION_DATE = 'urdatreg';
    public const TAX_REGISTRATION_DATE = 'urdatregnal';

    /**
     * Created date of this block
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * lng attribute
     * @var int
     */
    protected $language;

    /**
     * urname attribute
     * @var string
     */
    protected $name;

    /**
     * okpo attribute
     * @var int|null
     */
    protected $ergpou;

    /**
     * urfrms attribute
     * @var int|null
     */
    protected $form;

    /**
     * ureconom attribute
     * @var string|null
     */
    protected $economyBranch;

    /**
     * urvide attribute
     * @var string|null
     */
    protected $activityType;

    /**
     * urdatreg attribute
     * @var \DateTimeInterface|null
     */
    protected $edrRegistrationDate;

    /**
     * urdatregnal attribute
     * @var \DateTimeInterface|null
     */
    protected $taxRegistrationDate;

    /**
     * LegalIdentification constructor.
     *
     * @param \DateTimeInterface      $createdAt
     * @param int                     $language
     * @param string                  $name
     * @param int|null                $ergpou
     * @param int|null                $form
     * @param null|string             $economyBranch
     * @param null|string             $activityType
     * @param \DateTimeInterface|null $edrRegistrationDate
     * @param \DateTimeInterface|null $taxRegistrationDate
     */
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
