<?php

namespace Wearesho\Bobra\Ubki\Data\CreditDeal;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\CreditDeal
 */
class Entity extends Element
{
    public const TAG = 'crdeal';

    // attributes
    public const ID = 'dlfer';
    public const LANGUAGE = 'lng';
    public const INN = 'inn';
    public const LAST_NAME = 'lname';
    public const FIRST_NAME = 'fname';
    public const MIDDLE_NAME = 'fname';
    public const BIRTH_DATE = 'bdate';
    public const TYPE = 'dlcelcred';
    public const COLLATERAL = 'dlvidobes';
    public const REPAYMENT_PROCEDURE = 'dlporpog';
    public const CURRENCY = 'dlcurr';
    public const INITIAL_AMOUNT = 'dlamt';
    public const SUBJECT_ROLE = 'dlrolesub';
    public const COLLATERAL_COST = 'dlamtobes';

    /** @var string */
    protected $id;

    /** @var Data\Language */
    protected $language;

    /** @var string|null */
    protected $inn;

    /** @var string */
    protected $name;

    /** @var string|null */
    protected $middleName;

    /** @var string */
    protected $lastName;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Type */
    protected $type;

    /** @var Collateral */
    protected $collateral;

    /** @var RepaymentProcedure */
    protected $repaymentProcedure;

    /** @var Data\Currency */
    protected $currency;

    /** @var float */
    protected $initialAmount;

    /** @var Data\SubjectRole */
    protected $subjectRole;

    /** @var float */
    protected $collateralCost;

    /** @var Data\CreditDeal\DealLife\Collection */
    protected $dealLifes;

    public function __construct(
        string $id,
        Data\Language $language,
        string $name,
        string $lastName,
        \DateTimeInterface $birthDate,
        Type $type,
        Collateral $collateral,
        RepaymentProcedure $repaymentProcedure,
        Data\Currency $currency,
        float $initialAmount,
        Data\SubjectRole $subjectRole,
        float $collateralCost,
        Data\CreditDeal\DealLife\Collection $dealLifes,
        ?string $inn = null,
        ?string $middleName = null
    ) {
        $this->id = $id;
        $this->language = $language;
        $this->name = $name;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->type = $type;
        $this->collateral = $collateral;
        $this->repaymentProcedure = $repaymentProcedure;
        $this->currency = $currency;
        $this->initialAmount = $initialAmount;
        $this->subjectRole = $subjectRole;
        $this->collateralCost = $collateralCost;
        $this->dealLifes = $dealLifes;
        $this->inn = $inn;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLanguage(): Data\Language
    {
        return $this->language;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getCollateral(): Collateral
    {
        return $this->collateral;
    }

    public function getRepaymentProcedure(): RepaymentProcedure
    {
        return $this->repaymentProcedure;
    }

    public function getCurrency(): Data\Currency
    {
        return $this->currency;
    }

    public function getInitialAmount(): float
    {
        return $this->initialAmount;
    }

    public function getSubjectRole(): Data\SubjectRole
    {
        return $this->subjectRole;
    }

    public function getCollateralCost(): float
    {
        return $this->collateralCost;
    }

    public function getDealLifes(): DealLife\Collection
    {
        return $this->dealLifes;
    }
}
