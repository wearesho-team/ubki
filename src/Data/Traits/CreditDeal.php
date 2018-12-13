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
    protected $dealLifes;

    /** @var string|null */
    protected $inn;

    /** @var string|null */
    protected $patronymic;

    /** @var string|null */
    protected $source;

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

    public function getDealLifes(): Ubki\Data\Collections\DealLifes
    {
        return $this->dealLifes;
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

    public function associativeAttributes(): array
    {
        return [
            Ubki\Data\Interfaces\CreditDeal::LANGUAGE => $this->getLanguage(),
            Ubki\Data\Interfaces\CreditDeal::TYPE => $this->getType(),
            Ubki\Data\Interfaces\CreditDeal::SURNAME => $this->getSurname(),
            Ubki\Data\Interfaces\CreditDeal::BIRTH_DATE => $this->getBirthDate(),
            Ubki\Data\Interfaces\CreditDeal::NAME => $this->getName(),
            Ubki\Data\Interfaces\CreditDeal::INN => $this->getInn(),
            Ubki\Data\Interfaces\CreditDeal::PATRONYMIC => $this->getPatronymic(),
            Ubki\Data\Interfaces\CreditDeal::ID => $this->getId(),
            Ubki\Data\Interfaces\CreditDeal::CURRENCY => $this->getCurrency(),
            Ubki\Data\Interfaces\CreditDeal::COLLATERAL => $this->getCollateral(),
            Ubki\Data\Interfaces\CreditDeal::COLLATERAL_COST => $this->getCollateralCost(),
            Ubki\Data\Interfaces\CreditDeal::INITIAL_AMOUNT => $this->getInitialAmount(),
            Ubki\Data\Interfaces\CreditDeal::REPAYMENT_PROCEDURE => $this->getRepaymentProcedure(),
            Ubki\Data\Interfaces\CreditDeal::SOURCE => $this->getSource(),
            Ubki\Data\Interfaces\CreditDeal::SUBJECT_ROLE => $this->getSubjectRole(),
        ];
    }
}
