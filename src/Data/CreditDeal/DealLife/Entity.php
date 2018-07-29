<?php

namespace Wearesho\Bobra\Ubki\Data\CreditDeal\DealLife;

use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\CreditDeal\DealLife
 */
class Entity extends Ubki\Element
{
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

    /** @var \DateTimeInterface|null */
    protected $actualEndDate;

    /** @var int */
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

    /** @var int */
    protected $paymentIndication;

    /** @var int */
    protected $delayIndication;

    /** @var int */
    protected $creditTrancheIndication;

    /** @var \DateTimeInterface */
    protected $paymentDate;

    public function __construct(
        string $id,
        int $periodMonth,
        int $periodYear,
        \DateTimeInterface $issueDate,
        \DateTimeInterface $endDate,
        int $status,
        float $limit,
        float $mandatoryPayment,
        float $currentDebt,
        float $currentOverdueDebt,
        int $overdueTime,
        int $paymentIndication,
        int $delayIndication,
        int $creditTrancheIndication,
        \DateTimeInterface $paymentDate,
        ?\DateTimeInterface $actualEndDate = null
    ) {
        $this->id = $id;
        $this->periodMonth = $periodMonth;
        $this->periodYear = $periodYear;
        $this->issueDate = $issueDate;
        $this->endDate = $endDate;
        $this->actualEndDate = $actualEndDate;
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

    public function getActualEndDate(): ?\DateTimeInterface
    {
        return $this->actualEndDate;
    }

    public function getStatus(): int
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

    public function getPaymentIndication(): int
    {
        return $this->paymentIndication;
    }

    public function getDelayIndication(): int
    {
        return $this->delayIndication;
    }

    public function getCreditTrancheIndication(): int
    {
        return $this->creditTrancheIndication;
    }

    public function getPaymentDate(): \DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function tag(): string
    {
        return 'deallife';
    }
}
