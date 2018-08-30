<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\Blocks;
use Wearesho\Bobra\Ubki\References;

/**
 * Class CreditDeal
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class CreditDeal implements Blocks\Interfaces\CreditDeal
{
    use Blocks\Traits\CreditDeal;

    public function __construct(
        string $id,
        References\Language $language,
        string $name,
        string $surname,
        \DateTimeInterface $birthDate,
        References\CreditDealType $type,
        References\CollateralType $collateral,
        References\RepaymentProcedure $repaymentProcedure,
        References\Currency $currency,
        float $initialAmount,
        References\SubjectRole $subjectRole,
        float $collateralCost,
        Blocks\Collections\DealLifes $dealLifeCollection,
        ?string $inn = null,
        ?string $patronymic = null,
        ?string $source = null
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
        $this->dealLifeCollection = $dealLifeCollection;
        $this->inn = $inn;
        $this->patronymic = $patronymic;
        $this->source = $source;
    }
}
