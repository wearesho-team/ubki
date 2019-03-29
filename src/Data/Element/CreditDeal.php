<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditDeal
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class CreditDeal extends Ubki\Element implements Ubki\Data\Interfaces\CreditDeal
{
    use Ubki\Data\Traits\CreditDeal;

    public const TAG = 'crdeal';

    public function __construct(
        string $id,
        Ubki\Dictionary\Language $language,
        string $name,
        string $surname,
        \DateTimeInterface $birthDate,
        Ubki\Dictionary\CreditDeal $type,
        Ubki\Dictionary\Collateral $collateral,
        Ubki\Dictionary\RepaymentProcedure $repaymentProcedure,
        Ubki\Dictionary\Currency $currency,
        float $initialAmount,
        Ubki\Dictionary\SubjectRole $subjectRole,
        float $collateralCost,
        Ubki\Data\Collection\DealLifes $dealLifes,
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
