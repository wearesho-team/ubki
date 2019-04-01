<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class RequestHead
 * @package Wearesho\Bobra\Ubki\Data
 */
abstract class RequestHead
{
    public const TAG = 'request';

    public const VERSION = 'version';
    public const TYPE = 'reqtype';
    public const REASON = 'reqreason';
    public const DATE = 'reqdate';
    public const ID = 'reqidout';
    public const INITIATOR = 'reqsource';

    /** @var string */
    protected $version;

    /** @var Ubki\Dictionary\RequestReason */
    protected $reason;

    /** @var \DateTimeInterface|null */
    protected $date;

    /** @var string|null */
    protected $id;

    /** @var Ubki\Dictionary\RequestInitiator|null */
    protected $initiator;

    public function __construct(
        Ubki\Dictionary\RequestReason $reason,
        \DateTimeInterface $date = null,
        string $id = null,
        Ubki\Dictionary\RequestInitiator $initiator = null,
        string $version = '1.0'
    ) {
        $this->reason = $reason;
        $this->date = $date;
        $this->id = $id;
        $this->initiator = $initiator;
        $this->version = $version;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getReason(): Ubki\Dictionary\RequestReason
    {
        return $this->reason;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getInitiator(): ?Ubki\Dictionary\RequestInitiator
    {
        return $this->initiator;
    }
}
