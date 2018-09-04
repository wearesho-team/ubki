<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Data;

/**
 * Trait CreditDeal
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait CreditDeal
{
    use ElementTrait;

    /** @var string */
    protected $id;

    /** @var References\Language */
    protected $language;

    /** @var string */
    protected $name;

    /** @var string */
    protected $surname;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var References\CreditDealType */
    protected $type;

    /** @var References\CollateralType */
    protected $collateral;

    /** @var References\RepaymentProcedure */
    protected $repaymentProcedure;

    /** @var References\Currency */
    protected $currency;

    /** @var float */
    protected $initialAmount;

    /** @var References\SubjectRole */
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
            'id' => $this->id,
            'inn' => $this->inn,
            'language' => $this->language->__toString(),
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic,
            'birthDate' => Carbon::instance($this->birthDate)->toDateString(),
            'type' => $this->type->__toString(),
            'collateral' => $this->collateral->__toString(),
            'repaymentProcedure' => $this->repaymentProcedure->__toString(),
            'currency' => $this->currency->__toString(),
            'initialAmount' => $this->initialAmount,
            'subjectRole' => $this->subjectRole->__toString(),
            'collateralCost' => $this->collateralCost,
            'dealLifes' => array_map(function (Data\Interfaces\DealLife $dealLife): array {
                return $dealLife->jsonSerialize();
            }, $this->dealLifeCollection->jsonSerialize()),
            'source' => $this->source
        ];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLanguage(): References\Language
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

    public function getType(): References\CreditDealType
    {
        return $this->type;
    }

    public function getCollateral(): References\CollateralType
    {
        return $this->collateral;
    }

    public function getRepaymentProcedure(): References\RepaymentProcedure
    {
        return $this->repaymentProcedure;
    }

    public function getCurrency(): References\Currency
    {
        return $this->currency;
    }

    public function getInitialAmount(): float
    {
        return $this->initialAmount;
    }

    public function getSubjectRole(): References\SubjectRole
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
