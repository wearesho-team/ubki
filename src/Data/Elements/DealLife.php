<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Validation;

/**
 * Class DealLife
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class DealLife extends Infrastructure\Element implements Data\Interfaces\DealLife
{
    use Data\Traits\DealLife;

    public function __construct(
        string $id,
        int $periodMonth,
        int $periodYear,
        \DateTimeInterface $issueDate,
        \DateTimeInterface $endDate,
        Dictionaries\DealStatus $status,
        float $limit,
        float $mandatoryPayment,
        float $currentDebt,
        float $currentOverdueDebt,
        int $overdueTime,
        Dictionaries\Flag $paymentIndication,
        Dictionaries\Flag $delayIndication,
        Dictionaries\Flag $creditTrancheIndication,
        \DateTimeInterface $paymentDate,
        \DateTimeInterface $actualEndDate = null
    ) {
        $this->id = $id;
        $this->periodMonth = $periodMonth;
        $this->periodYear = $periodYear;
        $this->issueDate = $issueDate;
        $this->endDate = $endDate;
        $this->status = $status;
        $this->limit = $limit;
        $this->mandatoryPayment = $mandatoryPayment;
        $this->currentDebt = $currentDebt;
        $this->currentOverdueDebt = $currentOverdueDebt;
        $this->overdueTime = $overdueTime;
        $this->paymentIndication = $paymentIndication;
        $this->delayIndication = $delayIndication;
        $this->creditTrancheIndication = $creditTrancheIndication;
        $this->paymentDate = $paymentDate;
        $this->actualEndDate = $actualEndDate;

        parent::__construct();
    }

    public function rules(): ?Validation\RuleCollection
    {
        return new Validation\RuleCollection([
            new Validation\Rule(['actualEndDate',], function (?\DateTimeInterface $actualEndDate): bool {
                return !(is_null($actualEndDate) && $this->status->equals(Dictionaries\DealStatus::CLOSE()));
            }),
            new Validation\Rules\PeriodMonth(['periodMonth',])
        ]);
    }
}
