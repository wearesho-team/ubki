<?php

namespace Wearesho\Bobra\Ubki\Data\CreditDeal\DealLife;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\CreditDeal\DealLife
 */
class Entity extends Element implements \JsonSerializable
{
    public const TAG = 'deallife';

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

    /** @var Data\CreditDeal\Status */
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

    /** @var Data\Flag */
    protected $paymentIndication;

    /** @var Data\Flag */
    protected $delayIndication;

    /** @var Data\Flag */
    protected $creditTrancheIndication;

    /** @var \DateTimeInterface */
    protected $paymentDate;

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

    public function getStatus(): Data\CreditDeal\Status
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

    public function getPaymentIndication(): Data\Flag
    {
        return $this->paymentIndication;
    }

    public function getDelayIndication(): Data\Flag
    {
        return $this->delayIndication;
    }

    public function getCreditTrancheIndication(): Data\Flag
    {
        return $this->creditTrancheIndication;
    }

    public function getPaymentDate(): \DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'periodMonth' => $this->getPeriodMonth(),
            'periodYear' => $this->getPeriodYear(),
            'issueDate' => Carbon::instance($this->getIssueDate())->toDateString(),
            'endDate' => Carbon::instance($this->getEndDate())->toDateString(),
            'status' => (string)$this->getStatus(),
            'limit' => $this->getLimit(),
            'mandatoryPayment' => $this->getMandatoryPayment(),
            'currentDebt' => $this->getCurrentDebt(),
            'currentOverdueDebt' => $this->getCurrentOverdueDebt(),
            'overdueTime' => $this->getOverdueTime(),
            'paymentIndication' => (string)$this->getPaymentIndication(),
            'delayIndication' => (string)$this->getDelayIndication(),
            'creditTrancheIndication' => (string)$this->getCreditTrancheIndication(),
            'paymentDate' => Carbon::instance($this->getPaymentDate())->toDateString(),
            'actualEndDate' => Carbon::instance($this->getActualEndDate())->toDateString(),
        ];
    }
}
