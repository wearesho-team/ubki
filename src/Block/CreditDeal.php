<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditDeal
 * @package Wearesho\Bobra\Ubki\Block
 */
class CreditDeal extends Ubki\BaseBlock
{
    // attributes
    public const IDENTIFIER = 'dlref';
    public const LANGUAGE = 'lng';
    public const INN = 'inn';
    public const FIRST_NAME = 'fname';
    public const MIDDLE_NAME = 'mname';
    public const LAST_NAME = 'lname';
    public const BIRTH_DATE = 'bdate';
    public const TYPE = 'dlcelcred';
    public const COLLATERAL_TYPE = 'dlvidobes';
    public const REPAYMENT_PROCEDURE = 'dlporpog';
    public const CURRENCY = 'dlcurr';
    public const INIT_SUN = 'dlamt';
    public const DONOR = 'dldonor';
    public const ROLE = 'dlrolesub';
    public const COLLATERAL_COST = 'dlamtobes';

    /** @var string */
    protected $identifier;

    /** @var string */
    protected $language;

    /** @var int|null */
    protected $inn;

    /** @var string */
    protected $firstName;

    /** @var string|null */
    protected $middleName;

    /** @var string */
    protected $lastName;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var int */
    protected $type;

    /** @var int */
    protected $collateralType;

    /** @var int */
    protected $repaymentProcedure;

    /** @var int */
    protected $currency;

    /** @var float */
    protected $initSum;

    /**
     * Spurce Information
     * @var string
     */
    protected $donor;

    /** @var int */
    protected $role;

    /**
     * Cost of collateral in base currency
     * @var float
     */
    protected $collateralCost;

    /** @var Ubki\Collection\DealLife */
    protected $dealLifes;

    public function __construct(
        Ubki\Collection\DealLife $dealLifes,
        string $identifier,
        string $language,
        string $firstName,
        string $lastName,
        \DateTimeInterface $birthDate,
        int $type,
        int $collateralType,
        int $repaymentProcedure,
        int $currency,
        float $initSum,
        string $donor,
        int $role,
        float $collateralCost,
        ?int $inn = null,
        ?string $middleName = null
    ) {
        $this->identifier = $identifier;
        $this->language = $language;
        $this->inn = $inn;
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->type = $type;
        $this->collateralType = $collateralType;
        $this->repaymentProcedure = $repaymentProcedure;
        $this->currency = $currency;
        $this->initSum = $initSum;
        $this->donor = $donor;
        $this->role = $role;
        $this->collateralCost = $collateralCost;
        $this->dealLifes = $dealLifes;
    }

    public function tag(): string
    {
        return 'crdeal';
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getInn(): ?int
    {
        return $this->inn;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
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

    public function getType(): int
    {
        return $this->type;
    }

    public function getCollateralType(): int
    {
        return $this->collateralType;
    }

    public function getRepaymentProcedure(): int
    {
        return $this->repaymentProcedure;
    }

    public function getCurrency(): int
    {
        return $this->currency;
    }

    public function getInitSum(): float
    {
        return $this->initSum;
    }

    public function getDonor(): string
    {
        return $this->donor;
    }

    public function getRole(): int
    {
        return $this->role;
    }

    public function getCollateralCost(): float
    {
        return $this->collateralCost;
    }

    public function getDealLifes(): Ubki\Collection\DealLife
    {
        return $this->dealLifes;
    }
}
