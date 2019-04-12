<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class DealLife
 * @package Wearesho\Bobra\Ubki\Data
 */
class DealLife
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
    public const TRANCHE_INDICATION = 'dlfluse';
    public const CREDIT_TRANCHE_INDICATION_REF = 'dlfluseref';
    public const PAYMENT_DATE = 'dldateclc';

    /** @var string */
    protected $id;

    /** @var int */
    protected $periodMonth;

    /** @var int */
    protected $periodYear;

    /** @var \DateTimeInterface */
    protected $issueDate;

    /** @var \DateTimeInterface */
    protected $endDate;

    /** @var Ubki\Dictionary\DealStatus */
    protected $status;

    /** @var float */
    protected $limit;

    /** @var float */
    protected $mandatoryPayment;

    /** @var float */
    protected $currentDebt;

    /** @var float */
    protected $currentOverdueDebt;

    /** @var int */
    protected $overdueTime;

    /** @var Ubki\Dictionary\Flag */
    protected $paymentIndication;

    /** @var Ubki\Dictionary\Flag */
    protected $delayIndication;

    /** @var Ubki\Dictionary\Flag */
    protected $trancheIndication;

    /** @var \DateTimeInterface */
    protected $paymentDate;

    /**
     * This parameter is required if deal is closed
     *
     * @var \DateTimeInterface|null
     */
    protected $actualEndDate;

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
        Ubki\Validator::MONTH()->validate($periodMonth);
        Ubki\Validator::YEAR()->validate($periodYear);
        Ubki\Validator::BIG_FLOAT()->validate((string)$limit);
        Ubki\Validator::BIG_FLOAT()->validate((string)$mandatoryPayment);
        Ubki\Validator::BIG_FLOAT()->validate((string)$currentDebt);
        Ubki\Validator::BIG_FLOAT()->validate((string)$currentOverdueDebt);
        Ubki\Validator::SHORT_NUMBER()->validate((string)$overdueTime);

        if ($currentOverdueDebt == 0 && $overdueTime != 0
            || $currentOverdueDebt != 0 && $overdueTime == 0
        ) {
            throw new Ubki\Exception\Overdue($id);
        }

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

    public function getId(): string
    {
        return $this->id;
    }

    public function getPeriodMonth(): int
    {
        return $this->periodMonth;
    }

    public function getPeriodYear(): int
    {
        return $this->periodYear;
    }

    public function getIssueDate(): \DateTimeInterface
    {
        return $this->issueDate;
    }

    public function getEndDate(): \DateTimeInterface
    {
        return $this->endDate;
    }

    public function getStatus(): Ubki\Dictionary\DealStatus
    {
        return $this->status;
    }

    public function getLimit(): float
    {
        return $this->limit;
    }

    public function getMandatoryPayment(): float
    {
        return $this->mandatoryPayment;
    }

    public function getCurrentDebt(): float
    {
        return $this->currentDebt;
    }

    public function getCurrentOverdueDebt(): float
    {
        return $this->currentOverdueDebt;
    }

    public function getOverdueTime(): int
    {
        return $this->overdueTime;
    }

    public function getPaymentIndication(): Ubki\Dictionary\Flag
    {
        return $this->paymentIndication;
    }

    public function getDelayIndication(): Ubki\Dictionary\Flag
    {
        return $this->delayIndication;
    }

    public function getTrancheIndication(): Ubki\Dictionary\Flag
    {
        return $this->trancheIndication;
    }

    public function getPaymentDate(): \DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function getActualEndDate(): ?\DateTimeInterface
    {
        return $this->actualEndDate;
    }

    protected function validateActualEndDate(?string $actualEndDate, Ubki\Dictionary\DealStatus $status): void
    {
        if (is_null($actualEndDate) && $status->equals(Ubki\Dictionary\DealStatus::CLOSE())) {
            throw new \InvalidArgumentException("'Actual end date' must be set if deal status is CLOSE");
        }
    }
}
