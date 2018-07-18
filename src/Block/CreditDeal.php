<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki\Collection;

/**
 * Class CreditDeal
 * @package Wearesho\Bobra\Ubki\Block
 */
class CreditDeal
{
    public const TAG = 'crdeal';

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

    /**
     * Unique identifier of this deal
     * dlref attribute
     * @var string
     */
    protected $identifier;

    /**
     * lng attribute
     * @var string
     */
    protected $language;

    /**
     * inn attribute
     * @var int
     */
    protected $inn;

    /**
     * fname attribute
     * @var string
     */
    protected $firstName;

    /**
     * mname attribute
     * @var string
     */
    protected $middleName;

    /**
     * lname attribute
     * @var string
     */
    protected $lastName;

    /**
     * bdate attribute
     * @var \DateTimeInterface
     */
    protected $birthDate;

    /**
     * dlcelcred attribute
     * @var int
     */
    protected $type;

    /**
     * dlvidobes attribute
     * @var int
     */
    protected $collateralType;

    /**
     * dlporpog attribute
     * @var int
     */
    protected $repaymentProcedure;

    /**
     * dlcurr attribute
     * @var int
     */
    protected $currency;

    /**
     * Amount (initial) of this deal
     * dlamt attribute
     * @var float
     */
    protected $initSum;

    /**
     * Spurce Information
     * dldonor attribute
     * @var string
     */
    protected $donor;

    /**
     * dlrolesub attribute
     * @var int
     */
    protected $role;

    /**
     * Cost of collateral in base currency
     * dlamtobes attribute
     * @var float
     */
    protected $collateralCost;

    /** @var Collection\DealLife */
    protected $dealLifes;

    /**
     * CreditDeal constructor.
     *
     * @param string              $identifier
     * @param string              $language
     * @param int                 $inn
     * @param string              $firstName
     * @param string              $middleName
     * @param string              $lastName
     * @param \DateTimeInterface  $birthDate
     * @param int                 $type
     * @param int                 $collateralType
     * @param int                 $repaymentProcedure
     * @param int                 $currency
     * @param float               $initSum
     * @param string              $donor
     * @param int                 $role
     * @param float               $collateralCost
     * @param Collection\DealLife $dealLifes
     */
    public function __construct(
        string $identifier,
        string $language,
        int $inn,
        string $firstName,
        string $middleName,
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
        Collection\DealLife $dealLifes
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

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getInn(): int
    {
        return $this->inn;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getMiddleName(): string
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

    public function getDealLifes(): Collection\DealLife
    {
        return $this->dealLifes;
    }
}
