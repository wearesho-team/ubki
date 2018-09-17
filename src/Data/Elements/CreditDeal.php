<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class CreditDeal
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class CreditDeal extends Infrastructure\Element implements Data\Interfaces\CreditDeal
{
    use Data\Traits\CreditDeal;

    public function __construct(
        string $id,
        Dictionaries\Language $language,
        string $name,
        string $surname,
        \DateTimeInterface $birthDate,
        Dictionaries\CreditDealType $type,
        Dictionaries\CollateralType $collateral,
        Dictionaries\RepaymentProcedure $repaymentProcedure,
        Dictionaries\Currency $currency,
        float $initialAmount,
        Dictionaries\SubjectRole $subjectRole,
        float $collateralCost,
        Data\Collections\DealLifes $dealLifeCollection,
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
        $this->dealLifeCollection = $dealLifeCollection;
        $this->inn = $inn;
        $this->patronymic = $patronymic;
        $this->source = $source;

        parent::__construct();
    }
}
