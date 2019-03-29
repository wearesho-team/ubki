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

    /** @var Ubki\Dictionary\Language */
    protected $language;

    /** @var string */
    protected $name;

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Ubki\Dictionary\CreditDeal */
    protected $type;

    /** @var Ubki\Dictionary\Collateral */
    protected $collateral;

    /** @var Ubki\Dictionary\RepaymentProcedure */
    protected $repaymentProcedure;

    /** @var Ubki\Dictionary\Currency */
    protected $currency;

    /** @var float */
    protected $initialAmount;

    /** @var Ubki\Dictionary\SubjectRole */
    protected $subjectRole;

    /** @var float */
    protected $collateralCost;

    /** @var Ubki\Data\Collection\DealLifes */
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

    public function getLanguage(): Ubki\Dictionary\Language
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

    public function getType(): Ubki\Dictionary\CreditDeal
    {
        return $this->type;
    }

    public function getCollateral(): Ubki\Dictionary\Collateral
    {
        return $this->collateral;
    }

    public function getRepaymentProcedure(): Ubki\Dictionary\RepaymentProcedure
    {
        return $this->repaymentProcedure;
    }

    public function getCurrency(): Ubki\Dictionary\Currency
    {
        return $this->currency;
    }

    public function getInitialAmount(): float
    {
        return $this->initialAmount;
    }

    public function getSubjectRole(): Ubki\Dictionary\SubjectRole
    {
        return $this->subjectRole;
    }

    public function getCollateralCost(): float
    {
        return $this->collateralCost;
    }

    public function getDealLifes(): Ubki\Data\Collection\DealLifes
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
