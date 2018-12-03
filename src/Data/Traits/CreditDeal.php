<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait CreditDeal
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait CreditDeal
{
    /** @var string */
    protected $id;

    /** @var Ubki\Dictionaries\Language */
    protected $language;

    /** @var string */
    protected $name;

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Ubki\Dictionaries\CreditDealType */
    protected $type;

    /** @var Ubki\Dictionaries\CollateralType */
    protected $collateral;

    /** @var Ubki\Dictionaries\RepaymentProcedure */
    protected $repaymentProcedure;

    /** @var Ubki\Dictionaries\Currency */
    protected $currency;

    /** @var float */
    protected $initialAmount;

    /** @var Ubki\Dictionaries\SubjectRole */
    protected $subjectRole;

    /** @var float */
    protected $collateralCost;

    /** @var Ubki\Data\Collections\DealLifes */
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
            Ubki\Data\Interfaces\CreditDeal::ID => $this->id,
            Ubki\Data\Interfaces\CreditDeal::INN => $this->inn,
            Ubki\Data\Interfaces\CreditDeal::LANGUAGE => $this->language,
            Ubki\Data\Interfaces\CreditDeal::NAME => $this->name,
            Ubki\Data\Interfaces\CreditDeal::SURNAME => $this->surname,
            Ubki\Data\Interfaces\CreditDeal::PATRONYMIC => $this->patronymic,
            Ubki\Data\Interfaces\CreditDeal::BIRTH_DATE => $this->birthDate,
            Ubki\Data\Interfaces\CreditDeal::TYPE => $this->type,
            Ubki\Data\Interfaces\CreditDeal::COLLATERAL => $this->collateral,
            Ubki\Data\Interfaces\CreditDeal::REPAYMENT_PROCEDURE => $this->repaymentProcedure,
            Ubki\Data\Interfaces\CreditDeal::CURRENCY => $this->currency,
            Ubki\Data\Interfaces\CreditDeal::INITIAL_AMOUNT => $this->initialAmount,
            Ubki\Data\Interfaces\CreditDeal::SUBJECT_ROLE => $this->subjectRole,
            Ubki\Data\Interfaces\CreditDeal::COLLATERAL_COST => $this->collateralCost,
            Ubki\Data\Interfaces\CreditDeal::SOURCE => $this->source,
            'dealLifes' => $this->dealLifeCollection->jsonSerialize(),
        ];
    }

    public function tag(): string
    {
        return Ubki\Data\Interfaces\CreditDeal::TAG;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLanguage(): Ubki\Dictionaries\Language
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

    public function getType(): Ubki\Dictionaries\CreditDealType
    {
        return $this->type;
    }

    public function getCollateral(): Ubki\Dictionaries\CollateralType
    {
        return $this->collateral;
    }

    public function getRepaymentProcedure(): Ubki\Dictionaries\RepaymentProcedure
    {
        return $this->repaymentProcedure;
    }

    public function getCurrency(): Ubki\Dictionaries\Currency
    {
        return $this->currency;
    }

    public function getInitialAmount(): float
    {
        return $this->initialAmount;
    }

    public function getSubjectRole(): Ubki\Dictionaries\SubjectRole
    {
        return $this->subjectRole;
    }

    public function getCollateralCost(): float
    {
        return $this->collateralCost;
    }

    public function getDealLifeCollection(): Ubki\Data\Collections\DealLifes
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
