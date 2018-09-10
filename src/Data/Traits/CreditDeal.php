<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data;

/**
 * Trait CreditDeal
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait CreditDeal
{
    /** @var string */
    protected $id;

    /** @var Dictionaries\Language */
    protected $language;

    /** @var string */
    protected $name;

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Dictionaries\CreditDealType */
    protected $type;

    /** @var Dictionaries\CollateralType */
    protected $collateral;

    /** @var Dictionaries\RepaymentProcedure */
    protected $repaymentProcedure;

    /** @var Dictionaries\Currency */
    protected $currency;

    /** @var float */
    protected $initialAmount;

    /** @var Dictionaries\SubjectRole */
    protected $subjectRole;

    /** @var float */
    protected $collateralCost;

    /** @var Data\Collections\DealLifes */
    protected $dealLifeCollection;

    /** @var string|null */
    protected $inn;

    /** @var string|null */
    protected $patronymic;

    /** @var string|null */
    protected $source;

    public function jsonSerialize(): array
    {
        return [
            Data\Interfaces\CreditDeal::ID => $this->id,
            Data\Interfaces\CreditDeal::INN => $this->inn,
            Data\Interfaces\CreditDeal::LANGUAGE => $this->language,
            Data\Interfaces\CreditDeal::NAME => $this->name,
            Data\Interfaces\CreditDeal::SURNAME => $this->surname,
            Data\Interfaces\CreditDeal::PATRONYMIC => $this->patronymic,
            Data\Interfaces\CreditDeal::BIRTH_DATE => $this->birthDate,
            Data\Interfaces\CreditDeal::TYPE => $this->type,
            Data\Interfaces\CreditDeal::COLLATERAL => $this->collateral,
            Data\Interfaces\CreditDeal::REPAYMENT_PROCEDURE => $this->repaymentProcedure,
            Data\Interfaces\CreditDeal::CURRENCY => $this->currency,
            Data\Interfaces\CreditDeal::INITIAL_AMOUNT => $this->initialAmount,
            Data\Interfaces\CreditDeal::SUBJECT_ROLE => $this->subjectRole,
            Data\Interfaces\CreditDeal::COLLATERAL_COST => $this->collateralCost,
            Data\Interfaces\CreditDeal::SOURCE => $this->source,
            'dealLifes' => $this->dealLifeCollection->jsonSerialize(),
        ];
    }

    public function tag(): string
    {
        return Data\Interfaces\CreditDeal::TAG;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLanguage(): Dictionaries\Language
    {
        return $this->language;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getType(): Dictionaries\CreditDealType
    {
        return $this->type;
    }

    public function getCollateral(): Dictionaries\CollateralType
    {
        return $this->collateral;
    }

    public function getRepaymentProcedure(): Dictionaries\RepaymentProcedure
    {
        return $this->repaymentProcedure;
    }

    public function getCurrency(): Dictionaries\Currency
    {
        return $this->currency;
    }

    public function getInitialAmount(): float
    {
        return $this->initialAmount;
    }

    public function getSubjectRole(): Dictionaries\SubjectRole
    {
        return $this->subjectRole;
    }

    public function getCollateralCost(): float
    {
        return $this->collateralCost;
    }

    public function getDealLifeCollection(): Data\Collections\DealLifes
    {
        return $this->dealLifeCollection;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }
}
