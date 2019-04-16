<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class RequestHead
 * @package Wearesho\Bobra\Ubki\Data
 */
abstract class RequestHead implements Ubki\Contract\Data\RequestHead
{
    use Tagable;

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
        \DateTimeInterface $date = \null,
        string $id = \null,
        Ubki\Dictionary\RequestInitiator $initiator = \null,
        string $version = '1.0'
    ) {
        $this->reason = $reason;
        $this->date = $date;
        $this->id = $id;
        $this->initiator = $initiator;
        $this->version = $version;
    }

    public static function tag(): string
    {
        return 'request';
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
