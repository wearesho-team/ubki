<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditDeal
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class CreditDeal extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\CreditDeal
{
    use Ubki\Data\Traits\CreditDeal;

    public const TAG = 'crdeal';

    public function __construct(
        string $id,
        Ubki\Dictionaries\Language $language,
        string $name,
        string $surname,
        \DateTimeInterface $birthDate,
        Ubki\Dictionaries\CreditDealType $type,
        Ubki\Dictionaries\CollateralType $collateral,
        Ubki\Dictionaries\RepaymentProcedure $repaymentProcedure,
        Ubki\Dictionaries\Currency $currency,
        float $initialAmount,
        Ubki\Dictionaries\SubjectRole $subjectRole,
        float $collateralCost,
        Ubki\Data\Collections\DealLifes $dealLifes,
        string $inn = null,
        string $patronymic = null,
        string $source = null
    ) {
        $this->id = $id;
        $this->language = $language;
        $this->name = $name;
        $this->surname = $surname;
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
        $this->patronymic = $patronymic;
        $this->source = $source;
    }
}
