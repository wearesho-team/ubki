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
}
