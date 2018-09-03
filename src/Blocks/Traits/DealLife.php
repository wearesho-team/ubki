<?php

namespace Wearesho\Bobra\Ubki\Blocks\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\References;

/**
 * Trait DealLife
 * @package Wearesho\Bobra\Ubki\Blocks\Traits
 */
trait DealLife
{
    use ElementTrait;

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

    /** @var References\DealStatus */
    protected $status;

    /** @var float */
    protected $limit;

    /** @var float */
    protected $mandatoryPayment;

    /** @var  float */
    protected $currentDebt;

    /** @var float */
    protected $currentOverdueDebt;

    /** @var int */
    protected $overdueTime;

    /** @var References\Flag */
    protected $paymentIndication;

    /** @var References\Flag */
    protected $delayIndication;

    /** @var References\Flag */
    protected $creditTrancheIndication;

    /** @var \DateTimeInterface */
    protected $paymentDate;

    /**
     * This parameter is required if deal is closed
     *
     * @var \DateTimeInterface|null
     */
    protected $actualEndDate;

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'periodMonth' => $this->periodMonth,
            'periodYear' => $this->periodYear,
            'issueDate' => Carbon::instance($this->issueDate)->toDateString(),
            'endDate' => Carbon::instance($this->endDate)->toDateString(),
            'status' => $this->status->__toString(),
            'limit' => $this->limit,
            'mandatoryPayment' => $this->mandatoryPayment,
            'currentDebt' => $this->currentDebt,
            'currentOverdueDebt' => $this->currentOverdueDebt,
            'overdueTime' => $this->overdueTime,
            'paymentIndication' => $this->paymentIndication->__toString(),
            'delayIndication' => $this->delayIndication->__toString(),
            'creditTrancheIndication' => $this->creditTrancheIndication->__toString(),
            'paymentDate' => Carbon::instance($this->paymentDate)->toDateString(),
            'actualEndDate' => Carbon::instance($this->actualEndDate)->toDateString(),
        ];
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

    public function getStatus(): References\DealStatus
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

    public function getPaymentIndication(): References\Flag
    {
        return $this->paymentIndication;
    }

    public function getDelayIndication(): References\Flag
    {
        return $this->delayIndication;
    }

    public function getCreditTrancheIndication(): References\Flag
    {
        return $this->creditTrancheIndication;
    }

    public function getPaymentDate(): \DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function getActualEndDate(): ?\DateTimeInterface
    {
        return $this->actualEndDate;
    }

    protected function validateActualEndDate(?string $actualEndDate, References\DealStatus $status): void
    {
        if (is_null($actualEndDate) && $status->equals(References\DealStatus::CLOSE())) {
            throw new \InvalidArgumentException("'Actual end date' must be set if deal status is CLOSE");
        }
    }
}
