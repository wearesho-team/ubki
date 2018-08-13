<?php

namespace Wearesho\Bobra\Ubki\Data\CreditDeal\DealLife;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\CreditDeal\DealLife
 *
 * @property-read string                 $id
 * @property-read int                    $periodMonth
 * @property-read int                    $periodYear
 * @property-read \DateTimeInterface     $issueDate
 * @property-read \DateTimeInterface     $endDate
 * @property-read \DateTimeInterface     $actualEndDate
 * @property-read Data\CreditDeal\Status $status
 * @property-read float                  $limit
 * @property-read float                  $mandatoryPayment
 * @property-read float                  $currentDebt
 * @property-read float                  $currentOverdueDebt
 * @property-read int                    $overdueTime
 * @property-read Data\Flag              $paymentIndication
 * @property-read Data\Flag              $delayIndication
 * @property-read Data\Flag              $creditTrancheIndication
 * @property-read \DateTimeInterface     $paymentDate
 */
class Entity extends Element implements \JsonSerializable
{
    public const TAG = 'deallife';
    
    public const ID = 'dlref';
    public const PERIOD_MONTH = 'dlmonth';
    public const PERIOD_YEAR = 'dlyear';
    public const ISSUE_DATE = 'dlds';
    public const END_DATE = 'dldpf';
    public const ACTUAL_END_DATE = 'dldff';
    public const STATUS = 'dlflstat';
    public const STATUS_REF = 'dlflstatref';
    public const LIMIT = 'dlamtlim';
    public const MANDATORY_PAYMENT = 'dlamtpaym';
    public const CURRENT_DEBT = 'dlamtcur';
    public const CURRENT_OVERDUE_DEBT = 'dlamtexp';
    public const OVERDUE_TIME = 'dldayexp';
    public const PAYMENT_INDICATION = 'dlflpay';
    public const PAYMENT_INDICATION_REF = 'dlflpayref';
    public const DELAY_INDICATION = 'dlflbrk';
    public const DELAY_INDICATION_REF = 'dlflbrkref';
    public const CREDIT_TRANCHE_INDICATION = 'dlfluse';
    public const CREDIT_TRANCHE_INDICATION_REF = 'dlfluseref';
    public const PAYMENT_DATE = 'dldateclc';

    public function __construct(
        string $id,
        int $periodMonth,
        int $periodYear,
        \DateTimeInterface $issueDate,
        \DateTimeInterface $endDate,
        Data\CreditDeal\Status $status,
        float $limit,
        float $mandatoryPayment,
        float $currentDebt,
        float $currentOverdueDebt,
        int $overdueTime,
        Data\Flag $paymentIndication,
        Data\Flag $delayIndication,
        Data\Flag $creditTrancheIndication,
        \DateTimeInterface $paymentDate,
        ?\DateTimeInterface $actualEndDate = null
    ) {
        parent::__construct([
            'id' => $id,
            'periodMonth' => $periodMonth,
            'periodYear' => $periodYear,
            'issueDate' => $issueDate,
            'endDate' => $endDate,
            'actualEndDate' => $actualEndDate,
            'status' => $status,
            'limit' => $limit,
            'mandatoryPayment' => $mandatoryPayment,
            'currentDebt' => $currentDebt,
            'currentOverdueDebt' => $currentOverdueDebt,
            'overdueTime' => $overdueTime,
            'paymentIndication' => $paymentIndication,
            'delayIndication' => $delayIndication,
            'creditTrancheIndication' => $creditTrancheIndication,
            'paymentDate' => $paymentDate,
        ]);
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'periodMonth' => $this->periodMonth,
            'periodYear' => $this->periodYear,
            'issueDate' => Carbon::instance($this->issueDate)->toDateString(),
            'endDate' => Carbon::instance($this->endDate)->toDateString(),
            'status' => (string)$this->status,
            'limit' => $this->limit,
            'mandatoryPayment' => $this->mandatoryPayment,
            'currentDebt' => $this->currentDebt,
            'currentOverdueDebt' => $this->currentOverdueDebt,
            'overdueTime' => $this->overdueTime,
            'paymentIndication' => (string)$this->paymentIndication,
            'delayIndication' => (string)$this->delayIndication,
            'creditTrancheIndication' => (string)$this->creditTrancheIndication,
            'paymentDate' => Carbon::instance($this->paymentDate)->toDateString(),
            'actualEndDate' => Carbon::instance($this->actualEndDate)->toDateString(),
        ];
    }
}
