<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class DealLife
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class DealLife extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\DealLife
{
    use Ubki\Data\Traits\DealLife;

    public const TAG = 'deallife';

    public function __construct(
        string $id,
        int $periodMonth,
        int $periodYear,
        \DateTimeInterface $issueDate,
        \DateTimeInterface $endDate,
        Ubki\Dictionary\DealStatus $status,
        float $limit,
        float $mandatoryPayment,
        float $currentDebt,
        float $currentOverdueDebt,
        int $overdueTime,
        Ubki\Dictionary\Flag $paymentIndication,
        Ubki\Dictionary\Flag $delayIndication,
        Ubki\Dictionary\Flag $trancheIndication,
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
        $this->trancheIndication = $trancheIndication;
        $this->paymentDate = $paymentDate;

        $this->validateActualEndDate($actualEndDate, $status);

        $this->actualEndDate = $actualEndDate;
    }
}
